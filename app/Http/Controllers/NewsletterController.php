<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Mail\AdminNewsletterNotification;
use App\Mail\PeriodicNewsletter;
use App\Models\NewsletterSubscriber; // Assicurati che il modello esista

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Salva l'email nel database se non esiste già
        \App\Models\NewsletterSubscriber::firstOrCreate([
            'email' => $request->email
        ]);

        // Invia una mail di conferma all'utente
        Mail::to($request->email)->send(new NewsletterSubscribed($request->email));

        // Invia una notifica all'amministratore
        Mail::to('info@tuosito.it')->send(new AdminNewsletterNotification($request->email));

        return back()->with('success', 'Iscrizione avvenuta con successo! Controlla la tua email.');
    }

    public function inviaNewsletterPeriodica(Request $request)
    {
        $userEmail = $request->email; // Oppure recupera la lista degli iscritti

        $content = '
            <ul>
                <li>Nuovo prodotto: Olio EVO</li>
                <li><strong>Sabato prossimo ci sarà una sfilata! Non mancare!</strong></li>
            </ul>
        ';

        Mail::to($userEmail)->send(new PeriodicNewsletter($content));

        return back()->with('success', 'Newsletter periodica inviata!');
    }

    /**
     * Invio automatico della newsletter periodica a tutti gli iscritti.
     * Da richiamare tramite comando Artisan schedulato.
     */
    public function inviaNewsletterPeriodicaAutomatica()
    {
        $subscribers = NewsletterSubscriber::all();

        $content = '
            <ul>
                <li>Nuovo prodotto: Olio EVO</li>
                <li><strong>Sabato prossimo ci sarà una sfilata! Non mancare!</strong></li>
            </ul>
        ';

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new PeriodicNewsletter($content));
        }
    }
}
