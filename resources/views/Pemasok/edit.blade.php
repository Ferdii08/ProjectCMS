@extends('layouts.app')

@section('title', 'Edit Pemasok')

@section('content')
    <h2>Edit Data Pemasok</h2>

    <form method="POST" action="{{ route('pemasok.update', $pemasok->id) }}" style="line-height: 2;">
        @csrf
        @method('PUT')

        <label>Nama Perusahaan:
            <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $pemasok->nama_perusahaan) }}" required>
        </label><br>

        <label>Alamat:<br>
            <textarea name="alamat" rows="3" style="width: 300px;" required>{{ old('alamat', $pemasok->alamat) }}</textarea>
        </label><br>

        <label>No. Telepon:
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $pemasok->no_telepon) }}" required>
        </label><br>

        <label>Email:
            <input type="email" name="email" value="{{ old('email', $pemasok->email) }}" required>
        </label><br>

        <button type="submit" style="margin-top: 10px;">Simpan Perubahan</button>
    </form>

    <a href="{{ route('pemasok.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar pemasok</a>
@endsection
