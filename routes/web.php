<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin'])->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('product-categories', ProductCategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::delete('product-images/{product_image}', [ProductImageController::class, 'destroy'])->name('product-images.destroy');
    });
});

// Halaman landing juga bisa diakses via /landing jika diperlukan
Route::view('/landing', 'landing');
Route::view('/kategori', 'kategori');
Route::view('/tentang', 'tentang');
