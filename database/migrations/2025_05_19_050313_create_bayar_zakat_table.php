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
        Schema::create('bayar_zakat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kk');
            $table->string('jumlah_tanggungan');
            $table->string('jenis_bayar');
            $table->string('jumlah_tanggungan_dibayar');
            $table->integer('bayar_beras')->nullable();
            $table->integer('bayar_uang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_zakat');
    }
};
