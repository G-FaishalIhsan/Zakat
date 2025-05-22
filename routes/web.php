<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\muzakki\MuzakkiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mustahik\MustahikController;
use App\Http\Controllers\kategori_mustahik\KategoriMustahikController;
use App\Http\Controllers\pengumpulan\PengumpulanController;
use App\Http\Controllers\pengumpulan\LaporanPengumpulanController;
// Fixed controller imports - use the correct namespace where they actually exist
use App\Http\Controllers\DistribusiMustahikController;
use App\Http\Controllers\DistribusiWargaController;
use App\Http\Controllers\DistribusiController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('muzakki', MuzakkiController::class);
    Route::resource('mustahik', MustahikController::class);
    Route::resource('kategori_mustahik', KategoriMustahikController::class);
    Route::resource('pengumpulan', PengumpulanController::class);

    // Fixed resource routes with unique names
    Route::resource('distribusi-mustahik', DistribusiMustahikController::class);
    Route::resource('distribusi-warga', DistribusiWargaController::class);

    Route::get('/laporan/pengumpulan', [App\Http\Controllers\LaporanController::class, 'pengumpulan'])->name('laporan.pengumpulan');
    Route::get('/laporan/pengumpulan/pdf', [App\Http\Controllers\LaporanController::class, 'pengumpulanPdf'])->name('laporan.pengumpulan.pdf');
    Route::get('/laporan/pengumpulan/doc', [App\Http\Controllers\LaporanController::class, 'pengumpulanDoc'])->name('laporan.pengumpulan.doc');

    // Laporan Distribusi Zakat routes
    Route::get('/laporan/distribusi', [App\Http\Controllers\LaporanController::class, 'distribusi'])->name('laporan.distribusi');
    Route::get('/laporan/distribusi/pdf', [App\Http\Controllers\LaporanController::class, 'distribusiPdf'])->name('laporan.distribusi.pdf');
    Route::get('/laporan/distribusi/doc', [App\Http\Controllers\LaporanController::class, 'distribusiDoc'])->name('laporan.distribusi.doc');
});

require __DIR__ . '/auth.php';
