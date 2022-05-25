<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 't_rekammedis';
    protected $fillable = ['id_pasien', 'id_dokter', 'keluhan', 'diagnosa', 'tgl_periksa'];
    public function getDokterId()
    {
        # code...
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
    public function getpasienId()
    {
        # code...
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
