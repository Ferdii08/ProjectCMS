@extends('layouts.app')

@section('title', 'Edit Inventaris')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Data Inventaris</h4>
        <a href="{{ route('inventaris.show', $inventaris->id) }}" class="btn btn-light btn-sm">← Kembali ke detail</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('inventaris.update', $inventaris->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $inventaris->nama_barang) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" min="0" value="{{ old('jumlah_stok', $inventaris->jumlah_stok) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $inventaris->lokasi_penyimpanan) }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk Stok</label>
                <input type="date" name="tanggal_masuk_stok" value="{{ old('tanggal_masuk_stok', $inventaris->tanggal_masuk_stok) }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
