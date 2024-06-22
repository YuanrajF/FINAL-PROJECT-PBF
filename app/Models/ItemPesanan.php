<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_item',
        'harga_item',
    ];

    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'pesanan_to_item_pesanan')->withPivot('jumlah_item_pesanan');
    }
}

