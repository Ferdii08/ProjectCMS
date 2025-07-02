@extends('layouts.app')

@section('title', 'Tambah Inventaris')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Inventaris Baru</h4>
        <a href="{{ route('inventaris.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar inventaris</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('inventaris.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" min="0" value="{{ old('jumlah_stok') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk Stok</label>
                <input type="date" name="tanggal_masuk_stok" value="{{ old('tanggal_masuk_stok') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</div>
@endsection
