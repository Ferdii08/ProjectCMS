
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Staff</h1>

    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Tambah Staff</a>

    @if ($staffs->isEmpty())
        <div class="alert alert-info">
            Belum ada data staff.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Jabatan</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->nama }}</td>
                        <td>{{ $staff->posisi }}</td>
                        <td>{{ $staff->jabatan }}</td>
                        <td>{{ $staff->no_telepon }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>
                            <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
