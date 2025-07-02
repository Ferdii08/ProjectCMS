@extends('layouts.app')

@section('title', 'Daftar Detail Transaksi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Detail Transaksi</h4>
        <a href="{{ route('detailtransaksi.create') }}" class="btn btn-success btn-sm">+ Tambah Detail Transaksi</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger">
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>ID Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($detailtransaksis as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->transaksi_id }}</td>
                    <td>{{ $detail->produk_id }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp {{ number_format($detail->harga_satuan,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('detailtransaksi.show', $detail->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('detailtransaksi.edit', $detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('detailtransaksi.delete', $detail->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada detail transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
