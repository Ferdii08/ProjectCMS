<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    // Menampilkan daftar semua pelanggan
    public function index()
    {
        return view('pelanggan.index', [
            'pelanggans' => Pelanggan::all()
        ]);
    }

    // Menampilkan form tambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    
        {
    $messages = [
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
    ];
        
        $request->validate
        
        ([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Pelanggan::create([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
        ]);

        

       return redirect()->route('pelanggan.index')
                     ->with('success', 'Data berhasil di tambahkan');
          return redirect()->route('pelanggan.index')
                         ->with('success', 'Data berhasil diupdate');
    {
        return redirect()->route('pelanggan.edit', $id)
                         ->with('error', 'Data gagal diupdate: ' . $e->getMessage());
    }
                     
    }

    // Menampilkan detail pelanggan
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Memproses update data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('pelanggan.index')
                     ->with('success', 'Data berhasil di Update');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.delete', compact('pelanggan'));
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index');
    }
}