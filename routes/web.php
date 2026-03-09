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
Route::middleware(['auth'])->group(function() {

    Route::get('dashboard', \App\Http\Controllers\DashboardController::class)
        ->name('dashboard');

    Route::name('home.')->prefix('home')->group( function() {
        Route::resource('food', \App\Http\Controllers\Home\FoodController::class)->middleware([\App\Http\Middleware\IsAdminMiddleware::class])->except(['show']);

        Route::resource('shops', \App\Http\Controllers\Home\ShopController::class);
        Route::get('shops/{shop}/publish', [\App\Http\Controllers\Home\ShopPublishController::class, 'publish'])->name('shops.publish');
        Route::get('shops/{shop}/unpublish', [\App\Http\Controllers\Home\ShopPublishController::class, 'unpublish'])->name('shops.unpublish');
    });

});

require __DIR__.'/settings.php';


/*
 * Admin zone routes
 */
