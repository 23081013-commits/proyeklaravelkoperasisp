<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    // Mengunci nama tabel di database
    protected $table = 'pinjamans';

    // ⚠️ INI DIA KUNCINYA: Izinkan semua kolom diisi secara massal ke database
    protected $guarded = [];

    // Relasi ke model Anggota (untuk menampilkan nama anggota di tabel)
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}