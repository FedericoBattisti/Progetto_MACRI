<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\PeriodicNewsletter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SendPeriodicNewsletter extends Command
{
    protected $signature = 'newsletter:send';
    protected $description = 'Invia la newsletter periodica a tutti gli iscritti';

    public function handle()
    {
        // Controlla se la tabella esiste
        if (!Schema::hasTable('newsletter_subscribers')) {
            $this->error('La tabella newsletter_subscribers non esiste.');
            return 1;
        }

        // Recupera tutte le email degli iscritti
        $emails = DB::table('newsletter_subscribers')->pluck('email');

        if ($emails->isEmpty()) {
            $this->info('Nessun iscritto trovato.');
            return 0;
        }

        $content = '<p>Questo è il contenuto della newsletter periodica.</p>';

        foreach ($emails as $email) {
            Mail::to($email)->send(new PeriodicNewsletter($content));
        }

        $this->info('Newsletter inviata a tutti gli iscritti.');
        return 0;
    }
}
