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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_durasi');
            $table->unsignedBigInteger('id_item_pesanan');
            $table->unsignedBigInteger('atur_pesanan');
            $table->integer('harga_pesanan');
            $table->integer('nota_satuan');
            $table->timestamps();
    
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id_layanan')->on('layanans')->onDelete('cascade');
            $table->foreign('id_durasi')->references('id_durasi')->on('durasis')->onDelete('cascade');
            $table->foreign('atur_pesanan')->references('atur_pesanan')->on('atur_pesanans')->onDelete('cascade');
            $table->foreign('id_item_pesanan')->references('id_item_pesanan')->on('item_pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
