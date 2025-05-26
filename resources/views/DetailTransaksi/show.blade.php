@extends('layouts.app')


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@section('content')
<div class="container">
    <h2>Detail Transaksi #{{ $detailtransaksi->id }}</h2>

    <ul>
        <li><strong>ID Transaksi:</strong> {{ $detailtransaksi->transaksi_id }}</li>
        <li><strong>ID Produk:</strong> {{ $detailtransaksi->produk_id }}</li>
        <li><strong>Jumlah:</strong> {{ $detailtransaksi->jumlah }}</li>
        <li><strong>Harga Satuan:</strong> {{ $detailtransaksi->harga_satuan }}</li>
        <li><strong>Dibuat pada:</strong> {{ $detailtransaksi->created_at }}</li>
        <li><strong>Diperbarui pada:</strong> {{ $detailtransaksi->updated_at }}</li>
    </ul>

    <a href="{{ route('detailtransaksi.edit', $detailtransaksi->id) }}">Edit</a> |
    <a href="{{ route('detailtransaksi.delete', $detailtransaksi->id) }}">Hapus</a> |
    <a href="{{ route('detailtransaksi.index') }}">Kembali</a>
</div>
@endsection
