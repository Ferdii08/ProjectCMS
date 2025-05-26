@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Pelanggan</h2>

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- General error alert --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            @if ($errors->any())
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input 
                type="text" 
                name="nama" 
                class="form-control @error('nama') is-invalid @enderror" 
                value="{{ old('nama', $pelanggan->nama) }}"
            >
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input 
                type="text" 
                name="no_telepon" 
                class="form-control @error('no_telepon') is-invalid @enderror" 
                value="{{ old('no_telepon', $pelanggan->no_telepon) }}"
            >
            @error('no_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input 
                type="text" 
                name="alamat" 
                class="form-control @error('alamat') is-invalid @enderror" 
                value="{{ old('alamat', $pelanggan->alamat) }}"
            >
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $pelanggan->email) }}"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-secondary ms-2">← Kembali ke detail</a>
    </form>
</div>
@endsection
