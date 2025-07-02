@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Transaksi</h4>
        <a href="{{ route('transaksi.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar transaksi</a>
    </div>
    <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="tanggal_transaksi">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="total_harga">Total Harga</label>
                <input type="number" name="total_harga" id="total_harga" step="0.01" value="{{ old('total_harga') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="metode_pembayaran">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ old('metode_pembayaran') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="daftar_produk">Daftar Produk (JSON atau teks)</label>
                <textarea name="daftar_produk" id="daftar_produk" rows="4" class="form-control" required>{{ old('daftar_produk') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status_pengiriman">Status Pengiriman</label>
                <input type="text" name="status_pengiriman" id="status_pengiriman" value="{{ old('status_pengiriman') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
