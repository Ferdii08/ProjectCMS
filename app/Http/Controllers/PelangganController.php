<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $pelanggans = $query->get();

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'no_telepon' => 'required|string|max:20',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:pelanggans,email',
            ]);

            Pelanggan::create($validated);

            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan!');
        } catch (Throwable $e) {
            Log::error('Gagal menambahkan pelanggan', [
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:555',
                'no_telepon' => 'required|string|max:20',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:pelanggans,email,' . $id,
            ]);

            $pelanggan->update($validated);

            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui pelanggan', [
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus pelanggan', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('pelanggan.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
