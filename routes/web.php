<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');

Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::post('/store',[\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
    Route::get('/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/{id}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::patch('/{id}/destroy', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::post('/store',[\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});
