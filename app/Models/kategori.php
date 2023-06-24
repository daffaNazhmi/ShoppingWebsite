<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama_kategori',
        'gambar'
    ];

    public function Barang()
    {
        return $this->hasMany(barang::class, 'kategori_id', 'id');
    }
}
