<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;
use App\Mail\AdminNewsletterNotification;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            Log::info('Newsletter subscribe START', $request->all());

            $validated = $request->validate([
                'email' => 'required|email|unique:newsletter_subscribers,email',
            ], [
                'email.required' => 'L\'email è obbligatoria',
                'email.email' => 'Inserisci un\'email valida',
                'email.unique' => 'Questa email è già iscritta alla newsletter',
            ]);

            Log::info('Validation passed', $validated);

            // Salva l'iscrizione nel database
            $newsletter = NewsletterSubscriber::create([
                'email' => $validated['email']
            ]);

            Log::info('Newsletter SAVED', ['id' => $newsletter->id, 'email' => $newsletter->email]);

            // Invia email di conferma all'utente
            Mail::to($validated['email'])->send(new NewsletterSubscribed($newsletter->email));

            // Invia notifica all'admin
            $adminEmail = env('ADMIN_EMAIL', 'macriabbigliamentodonna@gmail.com');
            Mail::to($adminEmail)->send(new AdminNewsletterNotification($newsletter->email));

            return redirect()->back()->with('success', 'Grazie per esserti iscritto alla nostra newsletter! Controlla la tua email per il coupon sconto del 10%.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation ERROR', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Newsletter subscribe ERROR', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Si è verificato un errore: ' . $e->getMessage());
        }
    }
}
