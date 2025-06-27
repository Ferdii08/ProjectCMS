@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Pelanggan Baru</h2>

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

    <form method="POST" action="{{ route('pelanggan.store') }}" style="line-height: 2;">
        @csrf

        <label>Nama:
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </label><br>

        <label>Nomor Telepon:
            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" required>
        </label><br>

        <label>Alamat:
            <input type="text" name="alamat" value="{{ old('alamat') }}" required>
        </label><br>

        <label>Email:
            <input type="email" name="email" value="{{ old('email') }}" required>
        </label><br>

        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('pelanggan.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
