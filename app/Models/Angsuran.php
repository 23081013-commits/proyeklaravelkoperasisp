<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;

    // Mengunci nama tabel di phpMyAdmin agar sinkron
    protected $table = 'angsurans';

    // ⚠️ MEMBUKA GERBANG MASS ASSIGNMENT
    protected $guarded = [];

    // Relasi ke model Anggota (jika ingin menampilkan nama anggota di tabel angsuran)
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}