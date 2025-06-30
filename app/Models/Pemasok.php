<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasoks';

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'no_telepon',
        'email',
    ];

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Ambil semua data pemasok
    public static function getAll()
    {
        return self::all();
    }

    // ❌ Hapus method find() karena sudah ada di Laravel
}
