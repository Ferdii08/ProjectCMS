<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = ['id', 'nama', 'kategori', 'harga', 'stok'];

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public static function getAll()
    {
        return self::all();
    }
}
