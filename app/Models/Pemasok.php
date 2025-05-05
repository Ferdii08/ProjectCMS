<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasoks'; // Nama tabel

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'no_telepon',
        'email'
    ];

    protected $primaryKey = 'id'; // Primary key

    public $incrementing = true; // ID auto increment (default untuk integer)
    protected $keyType = 'int';  // Tipe ID (int)

    // Ambil semua data pemasok
    public static function getAll()
    {
        return self::all();
    }

    // Temukan data berdasarkan ID
    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
