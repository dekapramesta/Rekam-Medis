<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 't_rekammedis';
    protected $fillable = ['id_pasien', 'id_dokter', 'id_poli', 'keluhan', 'diagnosa', 'tindakan', 'resep_obat', 'tgl_periksa'];
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
    public function getPoli()
    {
        # code...
        return $this->belongsTo(Poliklinik::class, 'id_poli');
    }
}
