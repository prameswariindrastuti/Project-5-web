<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', \App\Http\Controllers\HomeController::class);

//route resource
// Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
Route::resource('/pembayaran', \App\Http\Controllers\PembayaranController::class);


// Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
// Route::get('pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
// Route::post('pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
// Route::delete('/pembayaran/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
