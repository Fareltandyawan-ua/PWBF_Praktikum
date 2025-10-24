<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false; // jika created_at digunakan, set true atau atur $timestamps dan $dates
    protected $fillable = ['created_at','anamnesa','temuan_klinis','diagnosa','idpet','dokter_pemeriksa'];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    // One-to-Many: rekam_medis -> detail_rekam_medis
    public function detail()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }

    // Many-to-Many via detail_rekam_medis pivot to kode_tindakan_terapi
    public function kodeTindakan()
    {
        return $this->belongsToMany(
            KodeTindakanTerapi::class,
            'detail_rekam_medis',
            'idrekam_medis',
            'idkode_tindakan_terapi'
        )->withPivot('iddetail_rekam_medis','detail'); // tambahkan pivot fields yang ada
    }
}
