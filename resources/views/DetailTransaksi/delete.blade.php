@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Konfirmasi Hapus Detail Transaksi</h2>

    <p>Apakah Anda yakin ingin menghapus data berikut?</p>

    <ul>
        <li><strong>ID:</strong> {{ $detailtransaksi->id }}</li>
        <li><strong>Transaksi ID:</strong> {{ $detailtransaksi->transaksi_id }}</li>
        <li><strong>Produk ID:</strong> {{ $detailtransaksi->produk_id }}</li>
        <li><strong>Jumlah:</strong> {{ $detailtransaksi->jumlah }}</li>
        <li><strong>Harga Satuan:</strong> {{ $detailtransaksi->harga_satuan }}</li>
    </ul>

    <form action="{{ route('detailtransaksi.destroy', $detailtransaksi->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('detailtransaksi.index') }}">Batal</a>
    </form>
</div>
@endsection
