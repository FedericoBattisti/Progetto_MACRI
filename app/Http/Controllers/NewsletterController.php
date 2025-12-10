<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Mail\AdminNewsletterNotification;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ], [
            'email.required' => 'L\'email è obbligatoria',
            'email.email' => 'Inserisci un\'email valida',
            'email.unique' => 'Questa email è già iscritta alla newsletter'
        ]);

        // Salva l'iscrizione nel database
        $newsletter = NewsletterSubscriber::create([
            'email' => $request->email
        ]);

        // Invia email di conferma all'utente
        Mail::to($request->email)->send(new NewsletterSubscribed($newsletter));

        // Invia notifica all'admin
        $adminEmail = env('ADMIN_EMAIL', 'macriabbigliamentodonna@gmail.com');
        Mail::to($adminEmail)->send(new AdminNewsletterNotification($newsletter));

        return redirect()->back()->with('success', 'Grazie per esserti iscritto alla nostra newsletter! Controlla la tua email per il coupon sconto del 10%.');
    }
}
