@extends('layouts.app')

@section('title', 'Detail Pemasok')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Pemasok</h4>
        <a href="{{ route('pemasok.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar pemasok</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama Perusahaan:</strong> {{ $pemasok->nama_perusahaan }}
        </div>
        <div class="mb-3">
            <strong>Alamat:</strong> {{ $pemasok->alamat }}
        </div>
        <div class="mb-3">
            <strong>No. Telepon:</strong> {{ $pemasok->no_telepon }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $pemasok->email }}
        </div>
        <div class="mt-4">
            <a href="{{ route('pemasok.edit', $pemasok->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pemasok ini?')">🗑️ Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
