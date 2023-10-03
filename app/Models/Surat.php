<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primarykey = 'id_surat';
    public $timestamps = false;
    protected $fillable = ['tanggal_surat', 'ringkasan', 'file'];

    //RELATION
    
}
