<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\EditorAuthenticated;
use Illuminate\Support\Facades\Route;

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

Route::get('/', [StoreController::class, 'index'])->name('home_page');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('show_product');

// Admin routes
Route::middleware(['auth', AdminAuthenticated::class])->group(function () {
    Route::get('/admin', [StoreController::class, 'index']); // New admin route
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});

// Editor routes
Route::middleware(['auth', EditorAuthenticated::class])->group(function () {
    Route::get('/editor', [StoreController::class, 'index']);
});

require __DIR__.'/auth.php';
