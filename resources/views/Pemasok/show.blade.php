@extends('layouts.app')

@section('title', 'Detail Pemasok')

@section('content')
    <h2>Detail Pemasok</h2>

    <p><strong>Nama Perusahaan:</strong> {{ $pemasok->nama_perusahaan }}</p>
    <p><strong>Alamat:</strong> {{ $pemasok->alamat }}</p>
    <p><strong>No. Telepon:</strong> {{ $pemasok->no_telepon }}</p>
    <p><strong>Email:</strong> {{ $pemasok->email }}</p>

    <a href="{{ route('pemasok.edit', $pemasok->id) }}">✏️ Edit</a> |
    <a href="{{ route('pemasok.delete', $pemasok->id) }}">🗑️ Hapus</a> |
    <a href="{{ route('pemasok.index') }}">← Kembali ke daftar</a>
@endsection
