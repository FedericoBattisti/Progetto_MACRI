<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeriodicNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    public function __construct($content)
    {
        // Imposta sempre il contenuto passato, senza messaggio di default
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject('La newsletter periodica di MÀCRÌ')
            ->view('emails.periodic_newsletter');
    }
}
