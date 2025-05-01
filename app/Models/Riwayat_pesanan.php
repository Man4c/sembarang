<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_pesanan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pesanan';
    protected $fillable = [
        'tgl_riwayat',
        'keterangan',
    ];
}
