<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\Pinjaman;
use App\Models\Angsuran;

class LaporanController extends Controller
{
    /**
     * Fitur 8.a: Menampilkan Laporan Data Anggota
     */
    public function anggota()
    {
        $anggota = Anggota::latest()->get();
        return view('laporan.anggota', compact('anggota'));
    }

    /**
     * Fitur 8.b: Menampilkan Laporan Data Simpanan
     */
    public function simpanan()
    {
        $simpanan = Simpanan::with('anggota')->latest()->get();
        return view('laporan.simpanan', compact('simpanan'));
    }

    /**
     * Fitur 8.c: Menampilkan Laporan Data Pinjaman
     */
    public function pinjaman()
    {
        $pinjaman = Pinjaman::with('anggota')->latest()->get();
        return view('laporan.pinjaman', compact('pinjaman'));
    }

    /**
     * Fitur 8.d: Menampilkan Laporan Data Angsuran
     */
    public function angsuran()
    {
        $angsuran = Angsuran::with('anggota')->latest()->get();
        return view('laporan.angsuran', compact('angsuran'));
    }
}