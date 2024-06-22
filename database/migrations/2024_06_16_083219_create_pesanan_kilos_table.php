<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_kilo', function (Blueprint $table) {
            $table->id('id_pesanan_kilo');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_durasi');
            $table->unsignedBigInteger('atur_pesanan');
            $table->integer('nota_kiloan');
            $table->integer('harga_kilo');
            $table->timestamps();
    
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id_layanan')->on('layanans')->onDelete('cascade');
            $table->foreign('id_durasi')->references('id_durasi')->on('durasis')->onDelete('cascade');
            $table->foreign('atur_pesanan')->references('atur_pesanan')->on('atur_pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_kilos');
    }
};
