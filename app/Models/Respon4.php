<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon4 extends Model
{
    use HasFactory;

    protected $table = 'respon4';
    protected $fillable = ['nim' . 'hadir', 'tugas', 'projek', 'total', 'huruf'];
}
