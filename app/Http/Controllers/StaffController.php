<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    // Menampilkan daftar semua staff
    public function index()
    {
        return view('staff.index', [
            'staffs' => Staff::all()
        ]);
    }

    // Menampilkan form tambah staff
    public function create()
    {
        return view('staff.create');
    }

    // Menyimpan data staff baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:staff,email',
        ]);

        Staff::create([
            'nama' => $request->input('nama'),
            'posisi' => $request->input('posisi'),
            'jabatan' => $request->input('jabatan'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('staff.index');
    }

    // Menampilkan detail staff
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    // Menampilkan form edit staff
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    // Memproses update data staff
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:staff,email,' . $id,
        ]);

        $staff = Staff::findOrFail($id);

        $staff->update([
            'nama' => $request->input('nama'),
            'posisi' => $request->input('posisi'),
            'jabatan' => $request->input('jabatan'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('staff.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.delete', compact('staff'));
    }

    // Menghapus data staff
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
