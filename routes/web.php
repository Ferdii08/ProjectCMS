<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

// Halaman Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman setelah login
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');

Route::get('/pendaftaran-ktp', function () {
    return 'Selamat datang di halaman Pendaftaran KTP Online!';
})->middleware('check.age');

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/test-notif', function () {
    return redirect()->route('detailtransaksi.index')->with('success', 'Notifikasi test berhasil!');
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
