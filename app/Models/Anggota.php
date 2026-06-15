<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Mengunci nama tabel di phpMyAdmin agar tidak salah deteksi
    protected $table = 'anggotas';

    // Menggunakan guarded kosong artinya kita mengizinkan semua kolom diisi secara massal
    protected $guarded = []; 
}