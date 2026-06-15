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
       Schema::create('simpanans', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal');
    $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade'); // Relasi ke Anggota
    $table->string('jenis_simpanan');
    $table->decimal('jumlah', 12, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanans');
    }
};
