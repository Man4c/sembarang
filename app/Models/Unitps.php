<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitps extends Model
{
    use HasFactory;
    protected $table = 'unitps';

    protected $fillable = [
        'nama',
        'kontroller',
        'tarif',
        'penyimpanan',
        'stok',
        'rincian',
        'gambar',
    ];
}
