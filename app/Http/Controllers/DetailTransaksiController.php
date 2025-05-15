<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    // Menampilkan daftar semua detail transaksi
    public function index()
    {
        return view('detailtransaksi.index', [
            'detailtransaksis' => DetailTransaksi::all()
        ]);
    }

    // Menampilkan form tambah detail transaksi
    public function create()
    {
        return view('detailtransaksi.create');
    }

    // Menyimpan data detail transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|integer',
            'produk_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        DetailTransaksi::create([
            'transaksi_id' => $request->input('transaksi_id'),
            'produk_id' => $request->input('produk_id'),
            'jumlah' => $request->input('jumlah'),
            'harga_satuan' => $request->input('harga_satuan'),
        ]);

        return redirect()->route('detailtransaksi.index');
    }

    // Menampilkan detail dari satu detail transaksi
    public function show($id)
    {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        return view('detailtransaksi.show', compact('detailtransaksi'));
    }

    // Menampilkan form edit detail transaksi
    public function edit($id)
    {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        return view('detailtransaksi.edit', compact('detailtransaksi'));
    }

    // Memproses update data detail transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'transaksi_id' => 'required|integer',
            'produk_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $detailtransaksi = DetailTransaksi::findOrFail($id);

        $detailtransaksi->update([
            'transaksi_id' => $request->input('transaksi_id'),
            'produk_id' => $request->input('produk_id'),
            'jumlah' => $request->input('jumlah'),
            'harga_satuan' => $request->input('harga_satuan'),
        ]);

        return redirect()->route('detailtransaksi.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        return view('detailtransaksi.delete', compact('detailtransaksi'));
    }

    // Menghapus data detail transaksi
    public function destroy($id)
    {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        $detailtransaksi->delete();

        return redirect()->route('detailtransaksi.index');
    }
}
