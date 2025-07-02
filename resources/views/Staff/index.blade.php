@extends('layouts.app')

@section('title', 'Daftar Staff')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Staff</h4>
        <a href="{{ route('staff.create') }}" class="btn btn-success btn-sm">+ Tambah Staff</a>
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
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Jabatan</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staffs as $staff)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->posisi }}</td>
                    <td>{{ $staff->jabatan }}</td>
                    <td>{{ $staff->no_telepon }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>
                        <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus staff ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data staff.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
