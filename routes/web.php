<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Page publique Home
Route::get('/', function () {
    $posts = \App\Models\Post::all();
    return Inertia::render('Home', [
        'posts' => $posts,
    ]);
})->name('page.home');

// Optionnel : /home redirige vers /
// Route::get('/home', function () {
//     return redirect()->route('page.home');
// });

// Page Cart

// Routes invités
Route::middleware('guest')->group(function () {
    Route::inertia('/login', 'Auth/Login')->name('page.login');
    Route::inertia('/register', 'Auth/Register')->name('page.register');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    });

    // Routes pour utilisateurs connectés
    Route::middleware('auth')->group(function () {
        Route::inertia('/cart', 'Cart')->name('page.cart');
        Route::resource('posts', PostController::class);
        Route::get('/profile', [ProfileController::class, 'index'])->name('page.profile');
});
