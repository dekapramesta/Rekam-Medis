<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 't_pasien';
    protected $primaryKey = 'id_pasien';
    protected $fillable = ['nama_pasien', 'gender', 'email', 'no_telp', 'alamat'];
    public function getpasien()
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
