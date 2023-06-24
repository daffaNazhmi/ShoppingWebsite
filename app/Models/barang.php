<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
        'kategori_id',
        'harga',
        'foto'
    ];

    public function Kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }

    public function Pesanan()
    {
        return $this->belongsTo(pesanan::class, 'pesanan_id', 'id');
    }
}
