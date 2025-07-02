<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Pemasok;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahPemasok = Pemasok::count();
        $jumlahTransaksi = Transaksi::count();

        return view('home', [
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahPemasok' => $jumlahPemasok,
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
    }
}
