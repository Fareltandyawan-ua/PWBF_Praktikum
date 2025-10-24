<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKlinis extends Model
{
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori_klinis'
    ];

    // Relasi: Kategoriklinis milik satu Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'fk_kategori', 'idkategori');
    }
}
