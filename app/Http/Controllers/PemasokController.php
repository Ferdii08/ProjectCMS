<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasoks = Pemasok::all();
        return view('pemasok.index', compact('pemasoks'));
    }

    public function create()
    {
        return view('pemasok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Pemasok::create($request->only(['nama_perusahaan', 'alamat', 'no_telepon', 'email']));

        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.show', compact('pemasok'));
    }

    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.edit', compact('pemasok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->only(['nama_perusahaan', 'alamat', 'no_telepon', 'email']));

        return redirect()->route('pemasok.index')->with('success', 'Data pemasok berhasil diperbarui.');
    }

    public function delete($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.delete', compact('pemasok'));
    }

    
    public function destroy($id)
    {
        $pemasoks = Pemasok::findOrFail($id);
        $pemasoks->delete();

        return redirect()->route('pemasok.index');
    }
}
