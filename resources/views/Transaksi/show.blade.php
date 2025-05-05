@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
    <h1>Detail Transaksi</h1>

    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal Transaksi:</strong> {{ $transaksi->tanggal_transaksi }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $transaksi->metode_pembayaran }}</p>
    <p><strong>Status Pengiriman:</strong> {{ $transaksi->status_pengiriman }}</p>
    <p><strong>Daftar Produk:</strong></p>
    <pre>{{ $transaksi->daftar_produk }}</pre>

    <a href="{{ route('transaksi.index') }}">Kembali ke Daftar Transaksi</a> |
    <a href="{{ route('transaksi.edit', $transaksi->id) }}">Edit</a> |
    <a href="{{ route('transaksi.delete', $transaksi->id) }}">Hapus</a>
@endsection
