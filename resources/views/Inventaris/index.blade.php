@extends('layouts.app')

@section('title', 'Daftar Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Daftar Inventaris</h2>

    <table border="1" cellpadding="10" cellspacing="0">
    <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>{{ $item->lokasi_penyimpanan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk_stok)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('inventaris.show', $item->id) }}">Lihat</a> |
                        <a href="{{ route('inventaris.edit', $item->id) }}">Edit</a> |
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data inventaris ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data inventaris.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('inventaris.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Inventaris</a>
@endsection
