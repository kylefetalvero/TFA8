<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

// Public pages
Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);

// Dashboard - authenticated users only
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// POS account management - authenticated users only
Route::middleware('auth')->group(function () {

    Route::resource('customers', CustomerController::class);

    Route::resource('users', UserController::class);

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Breeze authentication routes
require __DIR__.'/auth.php';
