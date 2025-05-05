<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Nama tabel sesuai konvensi

    protected $fillable = [
        'tanggal_transaksi',
        'total_harga',
        'metode_pembayaran',
        'daftar_produk',
        'status_pengiriman',
    ];

    protected $primaryKey = 'id';

    public $incrementing = true; // id bertipe auto increment (ubah ke false jika menggunakan string UUID)

    protected $keyType = 'int'; // ubah ke 'string' jika id-nya string

    // Mengambil semua data transaksi
    public static function getAll()
    {
        return self::all();
    }

    // Mengambil transaksi berdasarkan ID
    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
