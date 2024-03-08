<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Nama tabel di database

    protected $fillable = ['idbuku', 'kategori', 'namabuku', 'harga', 'stok', 'idpenerbit']; // Field yang dapat diisi (fillable)

    // Jika Anda tidak menggunakan timestamps (created_at, updated_at)
    public $timestamps = false;

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'IDPenerbit', 'IDPenerbit');
    }
}
