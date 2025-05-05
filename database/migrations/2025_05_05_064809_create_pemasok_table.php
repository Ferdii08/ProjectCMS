<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pemasoks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_perusahaan'); // Nama perusahaan pemasok
            $table->text('alamat'); // Alamat lengkap
            $table->string('no_telepon', 20); // Nomor telepon (maks 20 karakter)
            $table->string('email')->unique(); // Email, harus unik
            $table->timestamps(); // created_at dan updated_at
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pemasoks');
    }
};
