<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atur_pesanan extends Model
{
    use HasFactory;
    protected $table = 'atur_pesanans';
    protected $fillable = [
        'parfum',
        'antar_jemput',
        'diskon',
        'catatan',
        'proses_pesanan',
    ];
    
}
