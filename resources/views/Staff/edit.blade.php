@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
    <h2 style="margin-bottom: 16px;">Edit Data Staff</h2>

    <form method="POST" action="{{ route('staff.update', $staff->id) }}" style="line-height: 2;">
        @csrf
        @method('PUT')

        <label>Nama: 
            <input type="text" name="nama" value="{{ old('nama', $staff->nama) }}" required>
        </label><br><br>
        @error('nama')
            <span style="color: red;">{{ $message }}</span><br><br>
        @enderror

        <label>Posisi: 
            <input type="text" name="posisi" value="{{ old('posisi', $staff->posisi) }}" required>
        </label><br><br>
        @error('posisi')
            <span style="color: red;">{{ $message }}</span><br><br>
        @enderror

        <label>Jabatan: 
            <input type="text" name="jabatan" value="{{ old('jabatan', $staff->jabatan) }}" required>
        </label><br><br>
        @error('jabatan')
            <span style="color: red;">{{ $message }}</span><br><br>
        @enderror

        <label>Nomor Telepon: 
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $staff->no_telepon) }}" required>
        </label><br><br>
        @error('no_telepon')
            <span style="color: red;">{{ $message }}</span><br><br>
        @enderror

        <label>Email: 
            <input type="email" name="email" value="{{ old('email', $staff->email) }}" required>
        </label><br><br>
        @error('email')
            <span style="color: red;">{{ $message }}</span><br><br>
        @enderror

        <button type="submit" style="margin-top: 10px;">Update</button>
    </form>

    <a href="{{ route('staff.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
