<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return Inertia::render('Home', [
        'posts' => Post::all(),
    ]);
})->name('page.home');

// Nouveautés (New Arrival)
Route::get('/arrival', function () {
    return Inertia::render('Arrival', [
        // 'posts' => Post::latest()->get(),
    ]);
})->name('page.arrival');

// Meilleures ventes (Best Sellers)
Route::get('/sellers', function () {
    return Inertia::render('Sellers', [
        // 'posts' => Post::orderBy('sales_count', 'desc')->get(),
    ]);
})->name('page.sellers');

// Offre du jour (Deal of the Day)
Route::get('/deal', function () {
    return Inertia::render('Deal', [
        // 'posts' => Post::where('is_deal', true)->get(),
    ]);
})->name('page.deals');

// Bons plans (Hot Deals)
Route::get('/hot-deals', function () {
    return Inertia::render('HotDeal', [
        // 'posts' => Post::where('is_hot', true)->get(),
    ]);
})->name('page.hotdeals');



/*
|--------------------------------------------------------------------------
| Authentification (invités)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('page.login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('page.register');

    Route::post('/register', [AuthController::class, 'register']);
});


/*
|--------------------------------------------------------------------------
| Utilisateurs connectés
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Panier
    Route::inertia('/cart', 'Cart')->name('page.cart');

    // Déconnexion
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Dashboard commun
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        Route::get('/admin', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | Vendeur
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:seller')->group(function () {

        Route::get('/seller', [PostController::class, 'dashboard'])
            ->name('seller.dashboard');

        Route::resource('posts', PostController::class);
    });
});
