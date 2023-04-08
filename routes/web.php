<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');
    Route::post('/data-barang/list', [BarangController::class, 'list'])->name('data-barang.list');
    Route::post('/data-barang/store', [BarangController::class, 'store'])->name('data-barang.store');
    Route::delete('/data-barang/{barang}/destroy', [BarangController::class, 'destroy'])->name('data-barang.destroy');

    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
    Route::post('/satuan/list', [SatuanController::class, 'list'])->name('satuan.list');
    Route::post('/satuan/store', [SatuanController::class, 'store'])->name('satuan.store');
    Route::delete('/satuan/{satuan}/destroy', [SatuanController::class, 'destroy'])->name('satuan.destroy');
});