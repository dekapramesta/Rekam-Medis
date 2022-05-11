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
}
