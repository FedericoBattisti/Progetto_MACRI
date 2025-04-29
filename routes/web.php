<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');
Route::get('/collezione', [PublicController::class, 'collection'])->name('collection');
Route::get('/dove', [PublicController::class, 'dove'])->name('dove');
Route::get('/contatti', [PublicController::class, 'contatti'])->name('contatti');