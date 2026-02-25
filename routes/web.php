<?php

use Illuminate\Support\Facades\Route;

/*
 * Public routes
 */

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::get('shops', [\App\Http\Controllers\ShopController::class, 'index'])->name('shops.index');
Route::get('shops/{shop}', [\App\Http\Controllers\ShopController::class, 'show'])->name('shops.show');

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
