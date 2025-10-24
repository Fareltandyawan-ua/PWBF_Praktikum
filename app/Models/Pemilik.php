<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';
    public $timestamps = false;
    protected $fillable = ['no_wa','alamat'];



    // Inverse One-to-One: pemilik -> user
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    // One-to-Many: pemilik -> pet
    public function pets()
    {
        return $this->hasMany(Pet::class, 'idpemilik', 'idpemilik');
    }

    // public function pemilik()
    // {
    //     return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    // }
}
