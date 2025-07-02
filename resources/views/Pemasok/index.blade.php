@extends('layouts.app')

@section('title', 'Daftar Pemasok')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Pemasok</h4>
        <a href="{{ route('pemasok.create') }}" class="btn btn-success btn-sm">+ Tambah Pemasok</a>
    </div>
    <div class="card-body">
        {{-- Notifikasi sukses dan error --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pemasoks as $pemasok)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemasok->nama_perusahaan }}</td>
                    <td>{{ $pemasok->alamat }}</td>
                    <td>{{ $pemasok->no_telepon }}</td>
                    <td>{{ $pemasok->email }}</td>
                    <td>
                        <a href="{{ route('pemasok.show', $pemasok->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pemasok.edit', $pemasok->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('pemasok.delete', $pemasok->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data pemasok.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
