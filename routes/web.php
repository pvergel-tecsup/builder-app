<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/search', [ProductoController::class, 'list'])->name('productos.list');
Route::post('/productos/search', [ProductoController::class, 'search'])->name('productos.search');

Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/create', [ProductoController::class, 'store'])->name('productos.store');

Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::patch('/productos/edit/{id}', [ProductoController::class, 'update'])->name('productos.update');

