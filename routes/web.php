<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/audit', [LogController::class, 'index'])->middleware('auth')->can('manipulate-products');
Route::get('/api/products/audit', [LogController::class, 'api_index'])->middleware('auth')->can('manipulate-products');

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->can('manipulate-products');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth')->can('manipulate-products');

Route::get('/products/{product}', [ProductController::class, 'show'])->middleware('auth')->can('manipulate-products');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->can('manipulate-products');
Route::patch('/products/{product}', [ProductController::class, 'update'])->middleware('auth')->can('manipulate-products');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth')->can('manipulate-products');
