<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        return view('produk.index', [
            'produks' => Produk::all()
        ]);
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Generate id baru (max+1)
        $maxId = Produk::max('id');
        $newId = $maxId ? $maxId + 1 : 1;

        Produk::create([
            'id' => $newId,
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // Memproses update data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menampilkan halaman konfirmasi hapus produk
    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.delete', compact('produk'));
    }

    // Menghapus data produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
