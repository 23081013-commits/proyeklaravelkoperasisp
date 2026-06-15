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
        Schema::create('angsurans', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_bayar');
    // Catatan: Angsuran idealnya berelasi ke Pinjaman, namun jika mengikuti teks gambar (Anggota), gunakan ini:
    $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade'); 
    $table->decimal('jumlah_bayar', 12, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};
