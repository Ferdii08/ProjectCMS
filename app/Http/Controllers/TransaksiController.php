<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan; // Jika perlu menghubungkan transaksi dengan pelanggan

class TransaksiController extends Controller
{
    // Menampilkan daftar semua transaksi
    public function index()
    {
        return view('transaksi.index', [
            'transaksis' => Transaksi::all()
        ]);
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        return view('transaksi.create');
    }

    // Menyimpan data transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
            'daftar_produk' => 'required|string', // Bisa disesuaikan dengan format JSON jika diperlukan
            'status_pengiriman' => 'required|string',
        ]);

        // Menyimpan transaksi
        Transaksi::create([
            'tanggal_transaksi' => $request->input('tanggal_transaksi'),
            'total_harga' => $request->input('total_harga'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'daftar_produk' => $request->input('daftar_produk'),
            'status_pengiriman' => $request->input('status_pengiriman'),
        ]);

        return redirect()->route('transaksi.index');
    }

    // Menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Memproses update data transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
            'daftar_produk' => 'required|string',
            'status_pengiriman' => 'required|string',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'tanggal_transaksi' => $request->input('tanggal_transaksi'),
            'total_harga' => $request->input('total_harga'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'daftar_produk' => $request->input('daftar_produk'),
            'status_pengiriman' => $request->input('status_pengiriman'),
        ]);

        return redirect()->route('transaksi.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
    $transaksi = Transaksi::findOrFail($id);
    return view('transaksi.delete', compact('transaksi'));
    }
    // Menghapus data transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index');
    }
}
