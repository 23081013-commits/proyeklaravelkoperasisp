<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Bungkus rute dengan middleware auth agar aman
Route::middleware(['auth'])->group(function () {

    // 7. Dashboard Utama
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // 2 & 6. CRUD Data Anggota & Pencarian Anggota
    Route::resource('anggota', AnggotaController::class);

    // 3. CRUD Data Simpanan
    Route::resource('simpanan', SimpananController::class);

    // 4 & 6. CRUD Data Pinjaman & Pencarian Pinjaman
    Route::resource('pinjaman', PinjamanController::class);

    // 5. CRUD Data Angsuran
    Route::resource('angsuran', AngsuranController::class);

    // 8. Fitur Laporan (a, b, c, d)
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/anggota', [LaporanController::class, 'anggota'])->name('anggota');
        Route::get('/simpanan', [LaporanController::class, 'simpanan'])->name('simpanan');
        Route::get('/pinjaman', [LaporanController::class, 'pinjaman'])->name('pinjaman');
        Route::get('/angsuran', [LaporanController::class, 'angsuran'])->name('angsuran');
    });

});

// Memuat rute otentikasi bawaan Laravel Breeze (Login, Register, Logout)
require __DIR__.'/auth.php';