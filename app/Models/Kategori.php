<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['nama_kategori'];

    // Relasi: satu kategori memiliki banyak kategori klinis
    public function kategoriklinis()
    {
        return $this->hasMany(KategoriKlinis::class, 'idkategori', 'idkategori');
    }
}
