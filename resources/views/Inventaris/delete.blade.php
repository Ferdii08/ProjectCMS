@extends('layouts.app')

@section('title', 'Hapus Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Konfirmasi Hapus Inventaris</h2>

    <p>Apakah Anda yakin ingin menghapus item berikut?</p>

    <ul style="line-height: 1.8;">
        <li><strong>Nama Barang:</strong> {{ $inventaris->nama_barang }}</li>
        <li><strong>Jumlah Stok:</strong> {{ $inventaris->jumlah_stok }}</li>
        <li><strong>Lokasi Penyimpanan:</strong> {{ $inventaris->lokasi_penyimpanan }}</li>
        <li><strong>Tanggal Masuk:</strong> {{ $inventaris->tanggal_masuk_stok }}</li>
    </ul>

    <form method="POST" action="{{ route('inventaris.destroy', $inventaris->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" style="margin-top: 10px;">Hapus</button>
        <a href="{{ route('inventaris.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
@endsection
