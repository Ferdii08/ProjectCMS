@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Data Staff</h4>
        <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-light btn-sm">← Kembali ke detail</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('staff.update', $staff->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $staff->nama) }}" class="form-control" required>
                @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Posisi</label>
                <input type="text" name="posisi" value="{{ old('posisi', $staff->posisi) }}" class="form-control" required>
                @error('posisi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $staff->jabatan) }}" class="form-control" required>
                @error('jabatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="no_telepon" value="{{ old('no_telepon', $staff->no_telepon) }}" class="form-control" required>
                @error('no_telepon')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $staff->email) }}" class="form-control" required>
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
