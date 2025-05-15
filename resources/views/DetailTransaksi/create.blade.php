@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Detail Transaksi</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('detailtransaksi.store') }}" method="POST">
        @csrf

        <div>
            <label for="transaksi_id">ID Transaksi:</label><br>
            <input type="number" name="transaksi_id" id="transaksi_id" value="{{ old('transaksi_id') }}" required>
        </div>
        <br>

        <div>
            <label for="produk_id">ID Produk:</label><br>
            <input type="number" name="produk_id" id="produk_id" value="{{ old('produk_id') }}" required>
        </div>
        <br>

        <div>
            <label for="jumlah">Jumlah:</label><br>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" min="1" required>
        </div>
        <br>

        <div>
            <label for="harga_satuan">Harga Satuan:</label><br>
            <input type="number" name="harga_satuan" id="harga_satuan" step="0.01" value="{{ old('harga_satuan') }}" required>
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('detailtransaksi.index') }}">Batal</a>
    </form>
</div>
@endsection
