@extends('layouts.app')

@section('title', 'Edit Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Edit Data Inventaris</h2>

    <form method="POST" action="{{ route('inventaris.update', $inventaris->id) }}" style="line-height: 2;">
        @csrf
        @method('PUT')

        <label>Nama Barang:
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $inventaris->nama_barang) }}" required>
        </label><br>

        <label>Jumlah Stok:
            <input type="number" name="jumlah_stok" min="0" value="{{ old('jumlah_stok', $inventaris->jumlah_stok) }}" required>
        </label><br>

        <label>Lokasi Penyimpanan:
            <input type="text" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $inventaris->lokasi_penyimpanan) }}" required>
        </label><br>

        <label>Tanggal Masuk Stok:
            <input type="date" name="tanggal_masuk_stok" value="{{ old('tanggal_masuk_stok', $inventaris->tanggal_masuk_stok) }}" required>
        </label><br>

        <button type="submit" style="margin-top: 10px;">Simpan Perubahan</button>
    </form>

    <a href="{{ route('inventaris.show', $inventaris->id) }}" style="display: inline-block; margin-top: 20px;">← Kembali ke detail</a>
@endsection
