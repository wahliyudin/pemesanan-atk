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
        Schema::create('permintaan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_permintaan');
            $table->string('kode_barang');
            $table->integer('kuantitas');
            $table->timestamps();

            $table->foreign('kode_permintaan')->references('kode')->on('permintaan')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_barangs');
    }
};
