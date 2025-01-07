<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\AdministrasiController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute otentikasi
Auth::routes();

// Rute dengan middleware auth
Route::middleware('auth')->group(function () {
    // Rute manager
    Route::resource('manager', ManagerController::class)->names([
        'index' => 'manager_index',
        'create' => 'manager_create',
        'store' => 'manager_store',
        'show' => 'manager_show',
        'edit' => 'manager_edit',
        'update' => 'manager_update',
        'destroy' => 'manager_destroy',
    ]);
    Route::get('manager/laporan/cetak', [ManagerController::class, 'laporan'])->name('manager_laporan');

    // Rute pelanggan
    Route::resource('pelanggan', PelangganController::class)->names([
        'index' => 'pelanggan_index',
        'create' => 'pelanggan_create',
        'store' => 'pelanggan_store',
        'show' => 'pelanggan_show',
        'edit' => 'pelanggan_edit',
        'update' => 'pelanggan_update',
        'destroy' => 'pelanggan_destroy',
    ]);
    Route::get('pelanggan/laporan/cetak', [PelangganController::class, 'laporan'])->name('pelanggan_laporan');

    // Rute mekanik
    Route::resource('mekanik', MekanikController::class)->names([
        'index' => 'mekanik_index',
        'create' => 'mekanik_create',
        'store' => 'mekanik_store',
        'show' => 'mekanik_show',
        'edit' => 'mekanik_edit',
        'update' => 'mekanik_update',
        'destroy' => 'mekanik_destroy',
    ]);
    Route::get('mekanik/laporan/cetak', [MekanikController::class, 'laporan'])->name('mekanik_laporan');

    // Rute administrasi
    Route::resource('administrasi', AdministrasiController::class)->names([
        'index' => 'administrasi_index',
        'create' => 'administrasi_create',
        'store' => 'administrasi_store',
        'show' => 'administrasi_show',
        'edit' => 'administrasi_edit',
        'update' => 'administrasi_update',
        'destroy' => 'administrasi_destroy',
    ]);
    Route::get('administrasi/laporan/cetak', [AdministrasiController::class, 'laporan'])->name('administrasi_laporan');
}); 
