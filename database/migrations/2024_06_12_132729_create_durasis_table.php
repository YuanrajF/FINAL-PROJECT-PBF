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
        Schema::create('durasis', function (Blueprint $table) {
            $table->id('id_durasi');
            $table->string('jenis_durasi');
            $table->string('waktu_durasi');
            $table->integer('harga_durasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('durasis');
    }
};
