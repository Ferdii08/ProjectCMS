@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <h1>Daftar Transaksi</h1>

    

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Status Pengiriman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                    <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->metode_pembayaran }}</td>
                    <td>{{ $transaksi->status_pengiriman }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}">Detail</a> |
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}">Edit</a> |
                        <a href="{{ route('transaksi.delete', $transaksi->id) }}" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('transaksi.create') }}">+ Tambah Transaksi Baru</a>
@endsection
