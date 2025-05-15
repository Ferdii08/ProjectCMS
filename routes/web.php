<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DetailTransaksiController;


Route::get('/', function () {
    return view('home');
});

///Pelanggan
Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'delete'])->name('pelanggan.delete');
///Produk
Route::resource('produk', ProdukController::class);
Route::get('/produk/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete');
///Produk
Route::resource('pemasok', PemasokController::class);
Route::get('/pemasok/{id}/delete', [PemasokController::class, 'delete'])->name('pemasok.delete');
///Transaksi
Route::resource('transaksi', TransaksiController::class);
Route::get('transaksi/{id}/delete', [TransaksiController::class, 'delete'])->name('transaksi.delete');
///Inventaris
Route::resource('inventaris', InventarisController::class);
Route::get('inventaris/{id}/delete', [InventarisController::class, 'delete'])->name('inventaris.delete');
///Staff
Route::resource('staff', StaffController::class);
Route::get('staff/{id}/delete', [StaffController::class, 'delete'])->name('staff.delete');
///DetailTransaksi
Route::resource('detailtransaksi', DetailTransaksiController::class);
Route::get('detailtransaksi/{id}/delete', [DetailTransaksiController::class, 'delete'])->name('detailtransaksi.delete');
