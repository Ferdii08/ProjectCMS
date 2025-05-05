@extends('layouts.app')

@section('title', 'Tambah Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Inventaris Baru</h2>

    <form method="POST" action="{{ route('inventaris.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama Barang: <input type="text" name="nama_barang" required></label><br>
        <label>Jumlah Stok: <input type="number" name="jumlah_stok" min="0" required></label><br>
        <label>Lokasi Penyimpanan: <input type="text" name="lokasi_penyimpanan" required></label><br>
        <label>Tanggal Masuk Stok: <input type="date" name="tanggal_masuk_stok" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('inventaris.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
