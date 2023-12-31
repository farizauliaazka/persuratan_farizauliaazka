<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    public $timestamps = false;
    protected $fillable = ['id_jenis_surat', 
                            'id_user', 
                            'tanggal_surat', 
                            'ringksan', 
                            'file'];

    
}
