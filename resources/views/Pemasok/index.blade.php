@extends('layouts.app')

@section('title', 'Daftar Pemasok')

@section('content')
    <h2>Daftar Pemasok</h2>

    
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
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
                        <a href="{{ route('pemasok.show', $pemasok->id) }}">Lihat</a> |
                        <a href="{{ route('pemasok.edit', $pemasok->id) }}">Edit</a> |
                        <a href="{{ route('pemasok.delete', $pemasok->id) }}">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">Tidak ada data pemasok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
   <br> <a href="{{ route('pemasok.create') }}" style="margin-bottom: 16px; display: inline-block;">+ Tambah Pemasok Baru</a>

@endsection
