<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');
Route::get('/collezione', [PublicController::class, 'collection'])->name('collection');
Route::get('/dove', [PublicController::class, 'dove'])->name('dove');
Route::get('/contatti', [PublicController::class, 'contatti'])->name('contatti');
Route::get('/chi-siamo', [PublicController::class, 'chiSiamo'])->name('chi-siamo');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Route per dettaglio prodotto
Route::get('/prodotto/{clothe}', [PublicController::class, 'show'])->name('clothe.show');
Route::post('/contatti/invia', [ContactController::class, 'submit'])->name('contact.submit');
