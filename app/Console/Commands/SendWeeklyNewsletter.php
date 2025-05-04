<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NewsletterController;

class SendWeeklyNewsletter extends Command
{
    protected $signature = 'newsletter:send-weekly';
    protected $description = 'Invia la newsletter periodica a tutti gli iscritti';

    public function handle()
    {
        (new NewsletterController())->inviaNewsletterPeriodicaAutomatica();
        $this->info('Newsletter periodica inviata a tutti gli iscritti.');
    }
}
