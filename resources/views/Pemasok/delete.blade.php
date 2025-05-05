@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Pemasok')

@section('content')
    <h1>Yakin ingin menghapus pemasok ini?</h1>

    <p><strong>{{ $pemasok->nama_perusahaan }}</strong></p>
    <p>Alamat: {{ $pemasok->alamat }}</p>
    <p>No. Telepon: {{ $pemasok->no_telepon }}</p>
    <p>Email: {{ $pemasok->email }}</p>

    <!-- Form untuk menghapus pemasok -->
    <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('pemasok.show', $pemasok->id) }}">Batal</a>
@endsection
