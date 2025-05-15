@extends('layouts.app')

@section('title', 'Daftar Staff')

@section('content')
    <h2 style="margin-bottom: 16px;">Daftar Staff</h2>

    
    <table border="1" cellpadding="10" cellspacing="0">
    <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->posisi }}</td>
                    <td>{{ $staff->jabatan }}</td>
                    <td>{{ $staff->no_telepon }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>
                        <a href="{{ route('staff.show', $staff->id) }}">Lihat</a> |
                        <a href="{{ route('staff.edit', $staff->id) }}">Edit</a> |
                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus staff ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data staff.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('staff.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Staff</a>
@endsection
