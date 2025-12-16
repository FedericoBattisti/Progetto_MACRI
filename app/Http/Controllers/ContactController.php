<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validazione
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:1000',
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'Inserisci un\'email valida.',
            'message.required' => 'Il messaggio è obbligatorio.',
            'message.min' => 'Il messaggio deve contenere almeno 10 caratteri.',
            'message.max' => 'Il messaggio non può superare i 1000 caratteri.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Errore nell\'invio del messaggio. Controlla i dati inseriti.');
        }

        try {
            // Salva il messaggio nel database
            $contact = ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Invia email direttamente (con QUEUE_CONNECTION=sync non serve il Job)
            try {
                $adminEmail = config('mail.admin_email', 'macriabbigliamentodonna@gmail.com');
                Mail::to($adminEmail)->send(new ContactFormSubmitted($contact));

                Log::info('Email contatti inviata con successo');
            } catch (\Exception $mailException) {
                // Log errore ma non bloccare la risposta all'utente
                Log::error('Errore invio email contatti: ' . $mailException->getMessage());
            }

            return redirect()->back()->with('success', 'Grazie per averci contattato! Ti risponderemo al più presto.');
        } catch (\Exception $e) {
            Log::error('Errore form contatti: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Si è verificato un errore durante l\'invio. Riprova più tardi.')
                ->withInput();
        }
    }
}
