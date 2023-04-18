<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StokController;
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

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/list', [PegawaiController::class, 'list'])->name('pegawai.list');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::delete('/pegawai/{pegawai}/destroy', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasok');
    Route::post('/pemasok/list', [PemasokController::class, 'list'])->name('pemasok.list');
    Route::post('/pemasok/store', [PemasokController::class, 'store'])->name('pemasok.store');
    Route::delete('/pemasok/{pemasok}/destroy', [PemasokController::class, 'destroy'])->name('pemasok.destroy');

    Route::get('/stok', [StokController::class, 'index'])->name('stok');
    Route::post('/stok/list', [StokController::class, 'list'])->name('stok.list');
    Route::post('/stok/store', [StokController::class, 'store'])->name('stok.store');
    Route::get('/stok/{stok}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('/stok/{stok}/update', [StokController::class, 'update'])->name('stok.update');
    Route::delete('/stok/{stok}/destroy', [StokController::class, 'destroy'])->name('stok.destroy');
});