@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Transaksi</h4>
        <a href="{{ route('transaksi.create') }}" class="btn btn-success btn-sm">+ Tambah Transaksi</a>
    </div>
    <div class="card-body">
        {{-- Notifikasi sukses dan error --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                    <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->metode_pembayaran }}</td>
                    <td>{{ $transaksi->status_pengiriman }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('transaksi.delete', $transaksi->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
