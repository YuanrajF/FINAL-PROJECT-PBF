<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_durasi',
        'waktu_durasi',
        'harga_durasi'
    ];
}

