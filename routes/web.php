<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Page publique Home
Route::get('/', function () {
    $posts = \App\Models\Post::all();
    return Inertia::render('Home', [
        'posts' => $posts,
    ]);
})->name('page.home');



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('page.login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('page.register');
    Route::post('/register', [AuthController::class, 'register']);
    });
    
/*
|--------------------------------------------------------------------------
| Routes utilisateurs connectés
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::inertia('/cart', 'Cart')->name('page.cart');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');
    });

   Route::middleware(['auth', 'role:seller'])->group(function () {

    Route::get('/seller', [PostController::class, 'dashboard'])
        ->name('seller.dashboard');

    Route::resource('posts', PostController::class);
});
});