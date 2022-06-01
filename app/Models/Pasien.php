<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 't_pasien';
    protected $primaryKey = 'id_pasien';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nama_pasien', 'gender', 'nik', 'no_telp', 'alamat', 'no_rm', 'ttl', 'status', 'agama', 'pekerjaan', 'pendidikan'];
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
