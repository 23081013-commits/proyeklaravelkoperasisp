<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Anggota;

class SimpananController extends Controller
{
    /**
     * Menampilkan daftar riwayat simpanan.
     */
    public function index()
    {
        // Mengambil semua data simpanan beserta data anggota yang bersangkutan
        $simpanan = Simpanan::with('anggota')->latest()->get();
        return view('simpanan.index', compact('simpanan'));
    }

    /**
     * Menampilkan form tambah simpanan.
     */
    public function create()
    {
        // Mengambil semua data anggota untuk pilihan dropdown di form
        $anggota = Anggota::all();
        return view('simpanan.create', compact('anggota'));
    }

    /**
     * Menyimpan data simpanan baru + Validasi form.
     */
    public function store(Request $request)
    {
        // Terapkan validasi form sesuai ketentuan
        $request->validate([
            'tanggal' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id', // Memastikan ID anggota valid di database
            'jenis_simpanan' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
        ]);

        Simpanan::create([
            'tanggal' => $request->tanggal,
            'anggota_id' => $request->anggota_id,
            'jenis_simpanan' => $request->jenis_simpanan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('simpanan.index')->with('success', 'Data Simpanan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data simpanan.
     */
    public function edit($id)
    {
        $simpanan = Simpanan::findOrFail($id);
        $anggota = Anggota::all(); // Mengambil semua anggota untuk dropdown edit
        return view('simpanan.edit', compact('simpanan', 'anggota'));
    }

    /**
     * Memproses pembaruan data simpanan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id',
            'jenis_simpanan' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $simpanan = Simpanan::findOrFail($id);
        $simpanan->update([
            'tanggal' => $request->tanggal,
            'anggota_id' => $request->anggota_id,
            'jenis_simpanan' => $request->jenis_simpanan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('simpanan.index')->with('success', 'Data Simpanan berhasil diperbarui!');
    }

    /**
     * Menghapus data simpanan.
     */
    public function destroy($id)
    {
        $simpanan = Simpanan::findOrFail($id);
        $simpanan->delete();

        return redirect()->route('simpanan.index')->with('success', 'Data Simpanan berhasil dihapus!');
    }
}