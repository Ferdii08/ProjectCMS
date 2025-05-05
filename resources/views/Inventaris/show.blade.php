@extends('layouts.app')

@section('title', 'Detail Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Detail Inventaris</h2>

    <ul style="line-height: 1.8;">
        <li><strong>Nama Barang:</strong> {{ $inventaris->nama_barang }}</li>
        <li><strong>Jumlah Stok:</strong> {{ $inventaris->jumlah_stok }}</li>
        <li><strong>Lokasi Penyimpanan:</strong> {{ $inventaris->lokasi_penyimpanan }}</li>
        <li><strong>Tanggal Masuk:</strong> {{ $inventaris->tanggal_masuk_stok }}</li>
    </ul>

    <a href="{{ route('inventaris.edit', $inventaris->id) }}" style="margin-right: 10px;">✏️ Edit</a>
    <a href="{{ route('inventaris.delete', $inventaris->id) }}">🗑️ Hapus</a><br><br>
    <a href="{{ route('inventaris.index') }}">← Kembali ke daftar</a>
@endsection
