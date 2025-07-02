@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Produk</h4>
        <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-light btn-sm">← Kembali ke detail</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('produk.update', $produk->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" step="0.01" value="{{ old('harga', $produk->harga) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
