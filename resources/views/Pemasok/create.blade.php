@extends('layouts.app')

@section('title', 'Tambah Pemasok')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Pemasok Baru</h4>
        <a href="{{ route('pemasok.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar pemasok</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pemasok.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
