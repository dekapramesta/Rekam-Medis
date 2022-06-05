<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 't_dokter';
    public $incrementing = false;
    protected $fillable = ['nama_dokter', 'id_user', 'id_poli', 'spesialis', 'no_telp', 'alamat'];
    public function getDokter()
    {
        # code...
        return $this->hasOne(RekamMedis::class, 'id_dokter');
    }
    public function getManyDoc()
    {
        # code...
        return $this->hasMany(RekamMedis::class, 'id_dokter');
    }
    public function getPoli()
    {
        # code...
        return $this->belongsTo(Poliklinik::class, 'id_poli');
    }
}
