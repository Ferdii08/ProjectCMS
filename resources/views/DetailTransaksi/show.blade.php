@extends('layouts.app')

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
