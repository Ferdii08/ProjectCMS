@extends('layouts.app')

@section('title', 'Edit Pemasok')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Data Pemasok</h4>
        <a href="{{ route('pemasok.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar pemasok</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pemasok.update', $pemasok->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $pemasok->nama_perusahaan) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" required>{{ old('alamat', $pemasok->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" value="{{ old('no_telepon', $pemasok->no_telepon) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $pemasok->email) }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
