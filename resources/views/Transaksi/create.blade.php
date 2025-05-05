@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
    <h1>Tambah Transaksi</h1>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div>
            <label for="tanggal_transaksi">Tanggal Transaksi:</label><br>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}" required>
        </div>

        <div>
            <label for="total_harga">Total Harga:</label><br>
            <input type="number" name="total_harga" id="total_harga" step="0.01" value="{{ old('total_harga') }}" required>
        </div>

        <div>
            <label for="metode_pembayaran">Metode Pembayaran:</label><br>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ old('metode_pembayaran') }}" required>
        </div>

        <div>
            <label for="daftar_produk">Daftar Produk (JSON atau teks):</label><br>
            <textarea name="daftar_produk" id="daftar_produk" rows="4" required>{{ old('daftar_produk') }}</textarea>
        </div>

        <div>
            <label for="status_pengiriman">Status Pengiriman:</label><br>
            <input type="text" name="status_pengiriman" id="status_pengiriman" value="{{ old('status_pengiriman') }}" required>
        </div>

        <button type="submit" style="margin-top: 10px;">Simpan</button>
        <a href="{{ route('transaksi.index') }}">Batal</a>
    </form>
@endsection
