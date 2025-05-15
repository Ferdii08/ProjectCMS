@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
    <h2 style="margin-bottom: 16px;">Daftar Pelanggan</h2>

    <table border="1" cellpadding="10" cellspacing="0">
         <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $p->id) }}">Lihat</a> |
                        <a href="{{ route('pelanggan.edit', $p->id) }}">Edit</a> |
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('pelanggan.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Pelanggan</a>
@endsection
