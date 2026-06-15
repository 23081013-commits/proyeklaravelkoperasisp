<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;

    // Mengunci nama tabel di phpMyAdmin agar sesuai
    protected $table = 'simpanans';

    // Buka proteksi mass assignment agar semua data (tanggal, anggota_id, dll) bisa disimpan langsung
    protected $guarded = [];

    // Relasi ke model Anggota (jika nanti dibutuhkan untuk menampilkan nama anggota)
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}