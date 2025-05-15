@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h2 style="margin-bottom: 16px;">Daftar Produk</h2>

    <table border="1" cellpadding="10" cellspacing="0">
    <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{ $produk->id }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <a href="{{ route('produk.show', $produk->id) }}">Lihat</a> |
                        <a href="{{ route('produk.edit', $produk->id) }}">Edit</a> |
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('produk.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Produk</a>
@endsection
