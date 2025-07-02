@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Produk</h4>
        <a href="{{ route('produk.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama:</strong> {{ $produk->nama }}
        </div>
        <div class="mb-3">
            <strong>Kategori:</strong> {{ $produk->kategori }}
        </div>
        <div class="mb-3">
            <strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Stok:</strong> {{ $produk->stok }}
        </div>
        <div class="mt-4">
            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
