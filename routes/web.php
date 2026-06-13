<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('public.home');
Route::get('/artikel/{id}', [PublicController::class, 'show'])->name('public.artikel');
Route::get('/kategori/{id}', [PublicController::class, 'category'])->name('public.kategori');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('public.tentang');
Route::get('/semua-artikel', [PublicController::class, 'semuaArtikel'])->name('public.semua-artikel');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
});