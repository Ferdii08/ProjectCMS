@extends('layouts.app')

@section('title', 'Detail Inventaris')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Inventaris</h4>
        <a href="{{ route('inventaris.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar inventaris</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama Barang:</strong> {{ $inventaris->nama_barang }}
        </div>
        <div class="mb-3">
            <strong>Jumlah Stok:</strong> {{ $inventaris->jumlah_stok }}
        </div>
        <div class="mb-3">
            <strong>Lokasi Penyimpanan:</strong> {{ $inventaris->lokasi_penyimpanan }}
        </div>
        <div class="mb-3">
            <strong>Tanggal Masuk:</strong> {{ $inventaris->tanggal_masuk_stok }}
        </div>
        <div class="mt-4">
            <a href="{{ route('inventaris.edit', $inventaris->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('inventaris.delete', $inventaris->id) }}" class="btn btn-danger btn-sm">🗑️ Hapus</a>
        </div>
    </div>
</div>
@endsection
