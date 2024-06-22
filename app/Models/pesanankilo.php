<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananKilo extends Model
{
    protected $table = 'pesanan_kilo';
    protected $primaryKey = 'id_pesanan_kilo';
    public $timestamps = true;

    protected $fillable = [
        'id_pelanggan',
        'id_layanan',
        'id_durasi',
        'atur_pesanan',
        'harga_kilo',
        'nota_kiloan'
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
