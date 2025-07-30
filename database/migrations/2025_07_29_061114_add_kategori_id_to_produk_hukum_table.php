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
        Schema::table('produk_hukum', function (Blueprint $table) {
            $table->foreignId('kategori_id')
                ->nullable()
                ->constrained('kategori') // Menghubungkan ke tabel 'kategoris'
                ->onDelete('set null') // Jika kategori dihapus, kolom ini jadi null
                ->after('id'); // Posisikan kolom ini setelah kolom 'id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk_hukum', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
