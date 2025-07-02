@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Pelanggan</h4>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm">+ Tambah Pelanggan</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelanggans as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
