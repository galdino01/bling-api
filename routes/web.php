<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');

// Route::prefix('dashboard')->group(function () {
//     Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// });

Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::post('/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
    Route::get('/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/{id}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::patch('/{id}/destroy', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::post('/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/{id}/edit', [\App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('/{id}/update', [\App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::patch('/{id}/destroy', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');
});
