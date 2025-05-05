<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    // Menampilkan daftar semua inventaris
    public function index()
    {
        return view('inventaris.index', [
            'inventariss' => Inventaris::all()
        ]);
    }

    // Menampilkan form tambah inventaris
    public function create()
    {
        return view('inventaris.create');
    }

    // Menyimpan data inventaris baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_stok' => 'required|integer|min:0',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'tanggal_masuk_stok' => 'required|date',
        ]);

        Inventaris::create([
            'nama_barang' => $request->input('nama_barang'),
            'jumlah_stok' => $request->input('jumlah_stok'),
            'lokasi_penyimpanan' => $request->input('lokasi_penyimpanan'),
            'tanggal_masuk_stok' => $request->input('tanggal_masuk_stok'),
        ]);

        return redirect()->route('inventaris.index');
    }

    // Menampilkan detail inventaris
    public function show($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.show', compact('inventaris'));
    }

    // Menampilkan form edit inventaris
    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
    }

    // Memproses update data inventaris
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_stok' => 'required|integer|min:0',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'tanggal_masuk_stok' => 'required|date',
        ]);

        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update([
            'nama_barang' => $request->input('nama_barang'),
            'tanggal_masuk_stok' => $request->input('tanggal_masuk_stok'),
            'lokasi_penyimpanan' => $request->input('lokasi_penyimpanan'),
            'tanggal_masuk_stok' => $request->input('tanggal_masuk_stok'),
        ]);
        

        return redirect()->route('inventaris.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.delete', compact('inventaris'));
    }

    // Menghapus data inventaris
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()->route('inventaris.index');
    }
}
