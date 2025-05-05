@extends('layouts.app')

@section('title', 'Hapus Staff')

@section('content')
    <h2 style="margin-bottom: 16px;">Hapus Staff</h2>

    <p>Apakah Anda yakin ingin menghapus data staff berikut?</p>

    <ul>
        <li><strong>Nama:</strong> {{ $staff->nama }}</li>
        <li><strong>Posisi:</strong> {{ $staff->posisi }}</li>
        <li><strong>Jabatan:</strong> {{ $staff->jabatan }}</li>
        <li><strong>Nomor Telepon:</strong> {{ $staff->no_telepon }}</li>
        <li><strong>Email:</strong> {{ $staff->email }}</li>
    </ul>

    <form method="POST" action="{{ route('staff.destroy', $staff->id) }}">
        @csrf
        @method('DELETE')

        <button type="submit" style="margin-top: 10px; background-color: red; color: white; padding: 8px 16px; border: none; cursor: pointer;">
            Hapus
        </button>
    </form>

    <a href="{{ route('staff.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
