@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Produk Baru</h4>
        <a href="{{ route('produk.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('produk.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" step="0.01" min="0" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" min="0" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</div>
@endsection
