@extends('layouts.app')

@section('title', 'Detail Staff')

@section('content')
    <h2 style="margin-bottom: 16px;">Detail Staff</h2>

    <ul>
        <li><strong>Nama:</strong> {{ $staff->nama }}</li>
        <li><strong>Posisi:</strong> {{ $staff->posisi }}</li>
        <li><strong>Jabatan:</strong> {{ $staff->jabatan }}</li>
        <li><strong>Nomor Telepon:</strong> {{ $staff->no_telepon }}</li>
        <li><strong>Email:</strong> {{ $staff->email }}</li>
    </ul>

    <a href="{{ route('staff.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
    <a href="{{ route('staff.edit', $staff->id) }}" style="display: inline-block; margin-top: 20px; padding: 8px 16px; background-color: orange; color: white; text-decoration: none;">
        Edit Data
    </a>
    <a href="{{ route('staff.delete', $staff->id) }}" style="display: inline-block; margin-top: 20px; padding: 8px 16px; background-color: red; color: white; text-decoration: none;">
        Hapus Data
    </a>
@endsection
