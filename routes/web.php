<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BukuController;
Route::resource('buku', BukuController::class)->middleware('auth');

use App\Http\Controllers\KategoriController;
Route::resource('kategori', KategoriController::class)->middleware('auth');

use App\Http\Controllers\PenerbitController;
Route::resource('penerbit', PenerbitController::class)->middleware('auth');


Route::get('produk', [ProductController::class, 'index']);
Route::get('produk/create', [ProductController::class, 'create']);
Route::get('produk/{id}/edit', [ProductController::class, 'edit']);
Route::delete('produk/{id}', [ProductController::class, 'delete']);
