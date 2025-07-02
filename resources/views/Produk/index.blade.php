@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Produk</h4>
        <a href="{{ route('produk.create') }}" class="btn btn-success btn-sm">+ Tambah Produk</a>
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
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
