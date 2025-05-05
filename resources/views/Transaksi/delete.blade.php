@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Transaksi')

@section('content')
    <h1>Yakin ingin menghapus transaksi ini?</h1>

    <p><strong>Nomor Transaksi: {{ $transaksi->id }}</strong></p>
    <p>Tanggal Transaksi: {{ $transaksi->tanggal_transaksi }}</p>
    <p>Total Harga: Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
    <p>Metode Pembayaran: {{ $transaksi->metode_pembayaran }}</p>
    <p>Status Pengiriman: {{ $transaksi->status_pengiriman }}</p>
    
    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('transaksi.show', $transaksi->id) }}">Batal</a>
@endsection
