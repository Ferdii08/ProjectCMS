@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Pelanggan Baru</h4>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar</a>
    </div>
    <div class="card-body">
        {{-- Tampilkan pesan dari session jika ada --}}
        @if (session('error'))
            <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="color: red; margin-bottom: 20px;">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('pelanggan.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</div>
@endsection
