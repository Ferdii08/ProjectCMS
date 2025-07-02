@extends('layouts.app')

@section('title', 'Daftar Inventaris')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Inventaris</h4>
        <a href="{{ route('inventaris.create') }}" class="btn btn-success btn-sm">+ Tambah Inventaris</a>
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
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Lokasi Penyimpanan</th>
                    <th>Tanggal Masuk Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inventaris as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>{{ $item->lokasi_penyimpanan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk_stok)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('inventaris.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data inventaris ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data inventaris.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
