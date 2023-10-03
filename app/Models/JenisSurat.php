<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = 'jenis_surat';
    protected $primarykey = 'id_jenis_surat';
    public $timestamps = false;
    protected $fillable = 'jenis_surat';
}
