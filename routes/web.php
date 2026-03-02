<?php

use Illuminate\Support\Facades\Route;

/*
 * Public routes
 */

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::get('shops', [\App\Http\Controllers\ShopController::class, 'index'])->name('shops.index');
Route::get('shops/{shop}', [\App\Http\Controllers\ShopController::class, 'show'])->name('shops.show');

Route::get('food', [\App\Http\Controllers\FoodController::class, 'index'])->name('food.index');
Route::get('food/{food}', [\App\Http\Controllers\FoodController::class, 'show'])->name('food.show');


/*
 * User zone routes
 */
Route::get('dashboard', \App\Http\Controllers\DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('home/food', [\App\Http\Controllers\Home\FoodController::class, 'index'])->name('home.food.index');
require __DIR__.'/settings.php';


/*
 * Admin zone routes
 */
