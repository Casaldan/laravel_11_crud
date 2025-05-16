<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Products page as the main landing page after login
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Products RESTful routes (all protected)
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class)->except(['index']);
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

require __DIR__.'/auth.php';
