<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PermintaanController;
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
    if (auth()->guest()) {
        return to_route('login');
    }
    return to_route('dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:bendahara'])->group(function () {
        Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');
        Route::post('/data-barang/list', [BarangController::class, 'list'])->name('data-barang.list');
        Route::post('/data-barang/store', [BarangController::class, 'store'])->name('data-barang.store');
        Route::get('/data-barang/{barang}/edit', [BarangController::class, 'edit'])->name('data-barang.edit');
        Route::put('/data-barang/{barang}/update', [BarangController::class, 'update'])->name('data-barang.update');
        Route::delete('/data-barang/{barang}/destroy', [BarangController::class, 'destroy'])->name('data-barang.destroy');

        Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
        Route::post('/satuan/list', [SatuanController::class, 'list'])->name('satuan.list');
        Route::post('/satuan/store', [SatuanController::class, 'store'])->name('satuan.store');
        Route::get('/satuan/{satuan}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
        Route::put('/satuan/{satuan}/update', [SatuanController::class, 'update'])->name('satuan.update');
        Route::delete('/satuan/{satuan}/destroy', [SatuanController::class, 'destroy'])->name('satuan.destroy');

        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
        Route::post('/pegawai/list', [PegawaiController::class, 'list'])->name('pegawai.list');
        Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/pegawai/{pegawai}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/pegawai/{pegawai}/destroy', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

        Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasok');
        Route::post('/pemasok/list', [PemasokController::class, 'list'])->name('pemasok.list');
        Route::post('/pemasok/store', [PemasokController::class, 'store'])->name('pemasok.store');
        Route::get('/pemasok/{pemasok}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit');
        Route::put('/pemasok/{pemasok}/update', [PemasokController::class, 'update'])->name('pemasok.update');
        Route::delete('/pemasok/{pemasok}/destroy', [PemasokController::class, 'destroy'])->name('pemasok.destroy');

        Route::get('/stok', [StokController::class, 'index'])->name('stok');
        Route::post('/stok/list', [StokController::class, 'list'])->name('stok.list');
        Route::post('/stok/store', [StokController::class, 'store'])->name('stok.store');
        Route::get('/stok/{stok}/edit', [StokController::class, 'edit'])->name('stok.edit');
        Route::put('/stok/{stok}/update', [StokController::class, 'update'])->name('stok.update');
        Route::delete('/stok/{stok}/destroy', [StokController::class, 'destroy'])->name('stok.destroy');

        Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
        Route::post('/pemesanan/list', [PemesananController::class, 'list'])->name('pemesanan.list');
        Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
        Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
        Route::get('/pemesanan/{pemesanan:kode}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');
        Route::put('/pemesanan/{pemesanan:kode}/update', [PemesananController::class, 'update'])->name('pemesanan.update');
        Route::delete('/pemesanan/{pemesanan:kode}/destroy', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

        Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
        Route::post('/bidang/list', [BidangController::class, 'list'])->name('bidang.list');
        Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidang.store');
        Route::get('/bidang/{bidang}/edit', [BidangController::class, 'edit'])->name('bidang.edit');
        Route::put('/bidang/{bidang}/update', [BidangController::class, 'update'])->name('bidang.update');
        Route::delete('/bidang/{bidang}/destroy', [BidangController::class, 'destroy'])->name('bidang.destroy');

        Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
        Route::post('/pengguna/list', [PenggunaController::class, 'list'])->name('pengguna.list');
        Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('/pengguna/{user}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::put('/pengguna/{user}/update', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::delete('/pengguna/{user}/destroy', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    });

    Route::get('/permintaan', [PermintaanController::class, 'index'])->name('permintaan');
    Route::post('/permintaan/list', [PermintaanController::class, 'list'])->name('permintaan.list');
    Route::get('/permintaan/create', [PermintaanController::class, 'create'])->name('permintaan.create');
    Route::post('/permintaan/store', [PermintaanController::class, 'store'])->name('permintaan.store');
    Route::get('/permintaan/{permintaan:kode}/edit', [PermintaanController::class, 'edit'])->name('permintaan.edit');
    Route::put('/permintaan/{permintaan:kode}/update', [PermintaanController::class, 'update'])->name('permintaan.update');
    Route::delete('/permintaan/{permintaan:kode}/destroy', [PermintaanController::class, 'destroy'])->name('permintaan.destroy');
});
