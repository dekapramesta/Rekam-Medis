<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 't_obat';
    protected $fillable = ['nama_obat', 'harga', 'keterangan'];
    public function getPasien()
    {
        # code...
        return $this->hasOne(RekamMedis::class, 'id_pasien');
    }
    public function getManyPas()
    {
        # code...
        return $this->hasMany(RekamMedis::class, 'id_pasien');
    }
}
