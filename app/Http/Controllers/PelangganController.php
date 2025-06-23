<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PelangganController extends Controller
{
    // Menampilkan daftar semua pelanggan
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $pelanggans = $query->get();

        return view('pelanggan.index', compact('pelanggans'));
    }

    // Menampilkan form tambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pelanggans,email',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal :max karakter.',

            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'no_telepon.string' => 'Nomor telepon harus berupa teks.',
            'no_telepon.max' => 'Nomor telepon maksimal :max karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat maksimal :max karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal :max karakter.',
            'email.unique' => 'Email sudah digunakan oleh pelanggan lain.',
        ]);

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    // Menampilkan detail pelanggan
    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    // Memproses update data pelanggan
    public function update(Request $request, $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'no_telepon' => 'required|string|max:20',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:pelanggans,email,' . $id,
            ], [
                'nama.required' => 'Nama wajib diisi.',
                'no_telepon.required' => 'Nomor telepon wajib diisi.',
                'alamat.required' => 'Alamat wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan oleh pelanggan lain.',
            ]);

            $pelanggan->update($validated);

            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }
}
