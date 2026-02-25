<?php

use Illuminate\Support\Facades\Route;

/*
 * Public routes
 */

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');


/*
 * User zone routes
 */
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';


/*
 * Admin zone routes
 */
