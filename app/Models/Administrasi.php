<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;

    protected $table = 'mekaniks';

    protected $fillable = [
        'kode_administrasi',
        'pelanggan',
        'mekanik',           
        'jenis_masalah_kendaraan',
        'harga',
        'metode_pembayaran',
    ];

    public $timestamps = false; 
}

