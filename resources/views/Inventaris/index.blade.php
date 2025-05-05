@extends('layouts.app')

@section('title', 'Daftar Inventaris')

@section('content')
    <h2 style="margin-bottom: 16px;">Daftar Inventaris</h2>

    <a href="{{ route('inventaris.create') }}" style="margin-bottom: 16px; display: inline-block;">+ Tambah Inventaris Baru</a>

    @if($inventariss->isEmpty())
        <p>Tidak ada data inventaris.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Lokasi</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventariss as $inventaris)
                    <tr>
                        <td>{{ $inventaris->nama_barang }}</td>
                        <td>{{ $inventaris->jumlah_stok }}</td>
                        <td>{{ $inventaris->lokasi_penyimpanan }}</td>
                        <td>{{ $inventaris->tanggal_masuk_stok }}</td>
                        <td>
                            <a href="{{ route('inventaris.show', $inventaris->id) }}">Lihat</a> |
                            <a href="{{ route('inventaris.edit', $inventaris->id) }}">Edit</a> |
                            <a href="{{ route('inventaris.delete', $inventaris->id) }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
