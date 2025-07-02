@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Pelanggan</h4>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama:</strong> {{ $pelanggan->nama }}
        </div>
        <div class="mb-3">
            <strong>Nomor Telepon:</strong> {{ $pelanggan->no_telepon }}
        </div>
        <div class="mb-3">
            <strong>Alamat:</strong> {{ $pelanggan->alamat }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $pelanggan->email }}
        </div>
        <div class="mt-4">
            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection