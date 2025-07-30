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
    Schema::create('produk_hukum', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_peraturan'); // Contoh: UU No. 11 Tahun 2020
        $table->string('tentang'); // Contoh: Tentang Cipta Kerja
        $table->integer('tahun');
        $table->text('konten')->nullable();
        $table->string('nama_file'); // Untuk menyimpan nama file asli
        $table->string('path_file'); // Untuk menyimpan path file di server
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_hukum');
    }
};
