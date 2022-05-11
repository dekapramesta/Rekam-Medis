<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticateable;

class User extends Authenticateable
{
    use HasFactory;
    protected $table = 't_user';
    protected $primarykey = 'id';
    protected $fillable = ['username', 'password', 'level', 'status_user'];
}
