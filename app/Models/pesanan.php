<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama',
        'email',
        'alamat',
        'status'
    ];

    public function Barang()
    {
        return $this->hasMany(barang::class, 'pesanan_id', 'id');
    }
}
