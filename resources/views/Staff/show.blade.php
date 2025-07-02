@extends('layouts.app')

@section('title', 'Detail Staff')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Staff</h4>
        <a href="{{ route('staff.index') }}" class="btn btn-light btn-sm">← Kembali ke daftar staff</a>
    </div>
    <div class="card-body">
        <div class="mb-3"><strong>Nama:</strong> {{ $staff->nama }}</div>
        <div class="mb-3"><strong>Posisi:</strong> {{ $staff->posisi }}</div>
        <div class="mb-3"><strong>Jabatan:</strong> {{ $staff->jabatan }}</div>
        <div class="mb-3"><strong>Nomor Telepon:</strong> {{ $staff->no_telepon }}</div>
        <div class="mb-3"><strong>Email:</strong> {{ $staff->email }}</div>
        <div class="mt-4">
            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <a href="{{ route('staff.delete', $staff->id) }}" class="btn btn-danger btn-sm">🗑️ Hapus</a>
        </div>
    </div>
</div>
@endsection
