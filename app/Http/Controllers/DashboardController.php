<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\Pinjaman;
use App\Models\Angsuran;

class DashboardController extends Controller
{
    public function index()
    {
        // 7. Dashboard yang menampilkan akumulasi data:
        $jumlah_anggota = Anggota::count();
        $total_simpanan = Simpanan::sum('jumlah');
        $total_pinjaman = Pinjaman::sum('jumlah_pinjaman');
        $total_angsuran = Angsuran::sum('jumlah_bayar');

        // Diarahkan ke file app.blade.php di dalam folder layouts
        return view('layouts.app', compact(
            'jumlah_anggota', 
            'total_simpanan', 
            'total_pinjaman', 
            'total_angsuran'
        ));
    } // <-- Kurung kurawal penutup untuk fungsi index
} // <-- Kurung kurawal penutup untuk class DashboardController