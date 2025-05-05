@extends('layouts.app')

@section('title', 'Tambah Pemasok')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Pemasok Baru</h2>

    <form method="POST" action="{{ route('pemasok.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama Perusahaan: <input type="text" name="nama_perusahaan" required></label><br>

        <label>Alamat:<br>
            <textarea name="alamat" rows="3" style="width: 300px;" required></textarea>
        </label><br>

        <label>No. Telepon: <input type="text" name="no_telepon" required></label><br>

        <label>Email: <input type="email" name="email" required></label><br>

        <button type="submit" style="margin-top: 10px;">Simpan</button>
    </form>

    <a href="{{ route('pemasok.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar pemasok</a>
@endsection
