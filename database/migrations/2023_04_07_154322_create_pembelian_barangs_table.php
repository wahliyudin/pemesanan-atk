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
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembelian');
            $table->string('kode_barang');
            $table->integer('kuantitas');
            $table->timestamps();

            $table->foreign('kode_pembelian')->references('kode')->on('pembelian')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_barangs');
    }
};
