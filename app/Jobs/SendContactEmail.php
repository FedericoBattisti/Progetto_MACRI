<?php

namespace App\Jobs;

use App\Models\ContactMessage;
use App\Mail\ContactFormSubmitted;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact;
    public $tries = 3; // Riprova 3 volte in caso di errore
    public $timeout = 60; // Timeout di 60 secondi

    /**
     * Create a new job instance.
     */
    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adminEmail = config('mail.admin_email', 'macriabbigliamentodonna@gmail.com');
        Mail::to($adminEmail)->send(new ContactFormSubmitted($this->contact));
    }
    public function failed(\Throwable $exception): void
    {
        Log::error('Job SendContactEmail fallito: ' . $exception->getMessage());
    }
}
