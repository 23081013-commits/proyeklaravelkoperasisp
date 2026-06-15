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
       Schema::create('pinjamans', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_pinjaman');
    $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade'); // Relasi ke Anggota
    $table->decimal('jumlah_pinjaman', 12, 2);
    $table->integer('lama_angsuran'); // Misal: dalam hitungan bulan
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
