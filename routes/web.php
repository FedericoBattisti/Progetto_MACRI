<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');
Route::get('/collezione', [PublicController::class, 'collection'])->name('collection');
Route::get('/dove', [PublicController::class, 'dove'])->name('dove');
Route::get('/contatti', [PublicController::class, 'contatti'])->name('contatti');

// Route protette per le collezioni stagionali
Route::get('/collection/spring', [PublicController::class, 'collectionSpring'])
    ->middleware('season.check:spring')
    ->name('collection.spring');

Route::get('/collection/summer', [PublicController::class, 'collectionSummer'])
    ->middleware('season.check:summer')
    ->name('collection.summer');

Route::get('/collection/autumn', [PublicController::class, 'collectionAutumn'])
    ->middleware('season.check:autumn')
    ->name('collection.autumn');

Route::get('/collection/winter', [PublicController::class, 'collectionWinter'])
    ->middleware('season.check:winter')
    ->name('collection.winter');

Route::match(['get', 'post'], 'newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newslettersubscribe');
