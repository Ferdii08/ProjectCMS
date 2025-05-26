@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Daftar Detail Transaksi</h2>

    {{-- ✅ Notifikasi sukses di sini --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi ID</th>
                <th>Produk ID</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Waktu Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detailtransaksis as $dt)
                <tr>
                    <td>{{ $dt->id }}</td>
                    <td>{{ $dt->transaksi_id }}</td>
                    <td>{{ $dt->produk_id }}</td>
                    <td>{{ $dt->jumlah }}</td>
                    <td>{{ $dt->harga_satuan }}</td>
                    <td>{{ $dt->created_at }}</td>
                    <td>
                        <a href="{{ route('detailtransaksi.show', $dt->id) }}">Lihat</a> |
                        <a href="{{ route('detailtransaksi.edit', $dt->id) }}">Edit</a> |
                        <a href="{{ route('detailtransaksi.delete', $dt->id) }}">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('detailtransaksi.create') }}">+ Tambah Data</a>
</div>
@endsection
