<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');
Route::get('/collezione', [PublicController::class, 'collection'])->name('collection');
Route::get('/dove', [PublicController::class, 'dove'])->name('dove');
Route::get('/contatti', [PublicController::class, 'contatti'])->name('contatti');
Route::get('/collezione-summer', [PublicController::class, 'collectionSummer'])->name('collection.summer');
Route::get('/collezione-autumn', [PublicController::class, 'collectionAutumn'])->name('collection.autumn');
Route::get('/collezione-winter', [PublicController::class, 'collectionWinter'])->name('collection.winter');
Route::get('/collezione-spring', [PublicController::class, 'collectionSpring'])->name('collection.spring');
Route::match(['get', 'post'], 'newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newslettersubscribe');