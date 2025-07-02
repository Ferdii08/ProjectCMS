@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Transaksi</h4>
        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-light btn-sm">← Kembali ke detail</a>
    </div>
    <div class="card-body">
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="tanggal_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="total_harga">Total Harga</label>
                <input type="number" name="total_harga" id="total_harga" step="0.01" value="{{ old('total_harga', $transaksi->total_harga) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="metode_pembayaran">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ old('metode_pembayaran', $transaksi->metode_pembayaran) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status_pengiriman">Status Pengiriman</label>
                <input type="text" name="status_pengiriman" id="status_pengiriman" value="{{ old('status_pengiriman', $transaksi->status_pengiriman) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="daftar_produk">Daftar Produk (format teks/json)</label>
                <textarea name="daftar_produk" id="daftar_produk" rows="4" class="form-control" required>{{ old('daftar_produk', $transaksi->daftar_produk) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
