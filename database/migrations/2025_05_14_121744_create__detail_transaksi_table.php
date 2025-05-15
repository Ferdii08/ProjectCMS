<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis
            $table->unsignedBigInteger('transaksi_id'); // Foreign key untuk transaksi_id
            $table->unsignedBigInteger('produk_id'); // Foreign key untuk produk_id
            $table->integer('jumlah'); // Kolom jumlah
            $table->decimal('harga_satuan', 10, 2); // Kolom harga_satuan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
