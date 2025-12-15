<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TransferDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:transfer {--fresh : Esegui migrate:fresh prima del trasferimento}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trasferisce i dati dal database locale a Railway';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Inizio trasferimento dati...');

        // Opzione per ricreare le tabelle
        if ($this->option('fresh')) {
            $this->warn('⚠️  Eseguendo migrate:fresh su Railway (cancellerà tutti i dati esistenti)...');
            if ($this->confirm('Sei sicuro di voler continuare?')) {
                $this->call('migrate:fresh', ['--database' => 'mysql_railway', '--force' => true]);
            } else {
                $this->error('Operazione annullata.');
                return;
            }
        } else {
            // Esegui le migration normali
            $this->call('migrate', ['--database' => 'mysql_railway', '--force' => true]);
        }

        $this->newLine();

        // Ottieni tutte le tabelle dal database locale (escludendo migrations)
        $tables = $this->getLocalTables();

        $successCount = 0;
        $errorCount = 0;

        foreach ($tables as $table) {
            // Verifica se la tabella esiste su Railway
            if (!Schema::connection('mysql_railway')->hasTable($table)) {
                $this->warn("⏭️  Tabella {$table} non esiste su Railway, skip.");
                continue;
            }

            $this->info("📦 Copiando tabella: {$table}");

            try {
                // Ottieni tutti i dati dalla tabella locale
                $data = DB::connection('mysql_local')->table($table)->get();

                if ($data->isEmpty()) {
                    $this->comment("   ⚠️  Tabella {$table} vuota, skip.");
                    continue;
                }

                // Svuota la tabella di destinazione
                DB::connection('mysql_railway')->table($table)->truncate();

                $count = 0;
                // Inserisci i dati in chunk da 50 (ridotto per evitare timeout)
                foreach ($data->chunk(50) as $chunk) {
                    $records = $chunk->map(function ($item) {
                        return (array) $item;
                    })->toArray();

                    DB::connection('mysql_railway')->table($table)->insert($records);
                    $count += count($records);
                }

                $this->info("   ✅ {$table}: {$count} record copiati");
                $successCount++;
            } catch (\Exception $e) {
                $this->error("   ❌ Errore copiando {$table}: " . $e->getMessage());
                $errorCount++;

                // Mostra dettagli aggiuntivi per debug
                if ($this->option('verbose')) {
                    $this->error($e->getTraceAsString());
                }
                continue;
            }
        }

        $this->newLine();
        $this->info('📊 Trasferimento completato!');
        $this->info("   ✅ Tabelle copiate: {$successCount}");
        if ($errorCount > 0) {
            $this->warn("   ❌ Tabelle con errori: {$errorCount}");
        }

        // Verifica finale
        $this->newLine();
        $this->info('🔍 Verifica conteggio record:');

        foreach ($tables as $table) {
            if (!Schema::connection('mysql_local')->hasTable($table) ||
                !Schema::connection('mysql_railway')->hasTable($table)) {
                continue;
            }

            try {
                $countLocal = DB::connection('mysql_local')->table($table)->count();
                $countRailway = DB::connection('mysql_railway')->table($table)->count();

                $status = $countLocal === $countRailway ? '✅' : '⚠️';
                $color = $countLocal === $countRailway ? 'info' : 'warn';

                $this->{$color}("{$status} {$table}: Local={$countLocal}, Railway={$countRailway}");
            } catch (\Exception $e) {
                $this->error("❌ {$table}: Errore nel conteggio");
            }
        }
    }

    /**
     * Ottieni la lista delle tabelle dal database locale
     */
    private function getLocalTables(): array
    {
        $tables = DB::connection('mysql_local')
            ->select('SHOW TABLES');

        $databaseName = DB::connection('mysql_local')->getDatabaseName();
        $tableKey = "Tables_in_{$databaseName}";

        return collect($tables)
            ->pluck($tableKey)
            ->reject(function ($table) {
                // Escludi la tabella migrations
                return $table === 'migrations';
            })
            ->values()
            ->toArray();
    }
}
