<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('', 'Home')->name('page.home');
Route::inertia('cart' , 'Cart')->name('page.cart');

Route::middleware('guest')->group(function () {
    Route::inertia('/login', 'Auth/Login')->name('page.login');
    Route::inertia('/register', 'Auth/Register')->name('page.register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Auth (connecté)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('page.profile');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('auth.logout');
});
