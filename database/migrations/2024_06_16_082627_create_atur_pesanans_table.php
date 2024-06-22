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
        Schema::create('atur_pesanans', function (Blueprint $table) {
            $table->id('atur_pesanan');
            $table->enum('parfum', ['downy', 'kispray', 'repika', 'molto']);
            $table->enum('antar_jemput', ['iya', 'tidak']);
            $table->enum('diskon', [2000, 5000]);
            $table->enum('proses_pesanan', ['antrian', 'siap ambil', 'belum bayar']);

            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atur_pesanans');
    }
};
