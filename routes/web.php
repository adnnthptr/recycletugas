<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\AdministrasiController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

// Rute otentikasi
Auth::routes();

// Group rute dengan middleware auth
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

    Route::prefix('index')->group(function () {
        Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan_index');
        Route::get('/mekanik', [MekanikController::class, 'index'])->name('mekanik_index');
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager_index');
        Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi_index');
    });
    
    Route::prefix('create')->group(function () {
        Route::get('/pelanggan', [PelangganController::class, 'create'])->name('pelanggan_create');
        Route::get('/mekanik', [MekanikController::class, 'create'])->name('mekanik_create');
        Route::get('/manager', [ManagerController::class, 'create'])->name('manager_create');
        Route::get('/administrasi', [AdministrasiController::class, 'create'])->name('administrasi_create');
    });
    
    Route::prefix('laporan')->group(function () {
        Route::get('/pelanggan', [PelangganController::class, 'laporan'])->name('pelanggan_laporan');
        Route::get('/mekanik', [MekanikController::class, 'laporan'])->name('mekanik_laporan');
        Route::get('/manager', [ManagerController::class, 'laporan'])->name('manager_laporan');
        Route::get('/administrasi', [AdministrasiController::class, 'laporan'])->name('administrasi_laporan');
    });
    
    Route::prefix('edit')->group(function () {
        Route::get('/pelanggan/{id}', [PelangganController::class, 'edit'])->name('pelanggan_edit');
        Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan_update');
    
        Route::get('/mekanik/{id}', [MekanikController::class, 'edit'])->name('mekanik_edit');
        Route::put('/mekanik/{id}', [MekanikController::class, 'update'])->name('mekanik_update');
    
        Route::get('/manager/{id}', [ManagerController::class, 'edit'])->name('manager_edit');
        Route::put('/manager/{id}', [ManagerController::class, 'update'])->name('manager_update');
    
        Route::get('/administrasi/{id}', [AdministrasiController::class, 'edit'])->name('administrasi_edit');
        Route::put('/administrasi/{id}', [AdministrasiController::class, 'update'])->name('administrasi_update');
    });
});
