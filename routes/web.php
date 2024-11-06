<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Route Buku
    Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('buku/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    // Route Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('role:admin');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Route Penerbit
    Route::get('penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
    Route::get('penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
    Route::post('penerbit', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::get('penerbit/{id}', [PenerbitController::class, 'show'])->name('penerbit.show');
    Route::get('penerbit/{id}/edit', [PenerbitController::class, 'edit'])->name('penerbit.edit');
    Route::put('penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::delete('penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');

    // Route Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Hobi
    Route::get('hobi', [HobiController::class, 'index'])->name('hobi.index');
    Route::get('hobi/create', [HobiController::class, 'create'])->name('hobi.create');
    Route::post('hobi', [HobiController::class, 'store'])->name('hobi.store');
    Route::get('hobi/{id}', [HobiController::class, 'show'])->name('hobi.show');
    Route::get('hobi/{id}/edit', [HobiController::class, 'edit'])->name('hobi.edit');
    Route::put('hobi/{id}', [HobiController::class, 'update'])->name('hobi.update');
    Route::delete('hobi/{id}', [HobiController::class, 'destroy'])->name('hobi.destroy');
});

Route::get('/password/edit/{id}', [PasswordController::class, 'edit'])->name('password.edit');
Route::put('/password/update/{id}', [PasswordController::class, 'update'])->name('password.update');
// Route::put('/password/update/{id}', [PasswordController::class, 'update'])->name('password.update1');
