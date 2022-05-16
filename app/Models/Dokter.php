<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 't_dokter';
    protected $fillable = ['nama_dokter', 'spesialis', 'no_telp', 'alamat'];
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
}
