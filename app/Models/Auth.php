<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;
    protected $table = 'auth';
    protected $primarykey = 'id_user';
    protected $timestamp = false;
    protected $fillable =  ['username', 'password', 'role'];
}
