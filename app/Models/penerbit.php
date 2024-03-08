<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit'; // Nama tabel di database

    protected $fillable = ['idpenerbit','namapenerbit', 'alamat', 'kota', 'telepon']; // Field yang dapat diisi (fillable)

    public $timestamps = false;

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }

}
