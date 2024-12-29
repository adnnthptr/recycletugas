<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    use HasFactory;

    protected $table = 'mekaniks';

    protected $fillable = [
        'kode_mekanik',             
        'nama_mekanik',
        'bidang_mekanik',
        'no_hp',
        'jenis_masalah_kendaraan',
    ];

    public $timestamps = false;
}
