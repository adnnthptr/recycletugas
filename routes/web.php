<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('manager', ManagerController::class);
Route::get('manager/laporan/cetak', [ManagerController::class, 'laporan']);

Route::resource('pelanggan', PelangganController::class);
Route::get('pelanggan/laporan/cetak', [PelangganController::class, 'laporan']);
