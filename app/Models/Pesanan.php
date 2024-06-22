<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = [
        'id_pelanggan',
        'id_layanan',
        'id_durasi',
        'atur_pesanan',
        'id_item_pesanan',
        'harga_pesanan',
        'nota_satuan'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    public function durasi()
    {
        return $this->belongsTo(Durasi::class, 'id_durasi');
    }

    public function aturPesanan()
    {
        return $this->belongsTo(atur_pesanan::class, 'atur_pesanan');
    }
}
