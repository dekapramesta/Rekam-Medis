<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;
    protected $table = 't_poliklinik';
    protected $fillable = ['nama_poliklinik', 'gedung'];
}
