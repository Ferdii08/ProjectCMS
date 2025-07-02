@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Transaksi</h4>
        <a href="{{ route('transaksi.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar transaksi</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>ID Transaksi:</strong> {{ $transaksi->id }}
        </div>
        <div class="mb-3">
            <strong>Tanggal Transaksi:</strong> {{ $transaksi->tanggal_transaksi }}
        </div>
        <div class="mb-3">
            <strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Metode Pembayaran:</strong> {{ $transaksi->metode_pembayaran }}
        </div>
        <div class="mb-3">
            <strong>Status Pengiriman:</strong> {{ $transaksi->status_pengiriman }}
        </div>
        <div class="mb-3">
            <strong>Daftar Produk:</strong>
            <pre>{{ $transaksi->daftar_produk }}</pre>
        </div>
        <div class="mt-4">
            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
