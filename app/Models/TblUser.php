<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TblUser extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];
    public $timestamps = false;
    protected $fillable =  ['username', 'password', 'role'];
}
