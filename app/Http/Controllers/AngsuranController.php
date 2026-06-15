<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use App\Models\Anggota;

class AngsuranController extends Controller
{
    /**
     * Menampilkan daftar riwayat pembayaran angsuran.
     */
    public function index()
    {
        // Mengambil semua data angsuran beserta data anggota terkait
        $angsuran = Angsuran::with('anggota')->latest()->get();
        return view('angsuran.index', compact('angsuran'));
    }

    /**
     * Menampilkan form tambah bayar angsuran.
     */
    public function create()
    {
        $anggota = Anggota::all();
        return view('angsuran.create', compact('anggota'));
    }

    /**
     * Menyimpan data pembayaran angsuran baru + Validasi form.
     */
    public function store(Request $request)
    {
        // Terapkan validasi form sesuai ketentuan struktur data minimal
        $request->validate([
            'tanggal_bayar' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        Angsuran::create([
            'tanggal_bayar' => $request->tanggal_bayar,
            'anggota_id' => $request->anggota_id,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('angsuran.index')->with('success', 'Data Angsuran berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data angsuran.
     */
    public function edit($id)
    {
        $angsuran = Angsuran::findOrFail($id);
        $anggota = Anggota::all();
        return view('angsuran.edit', compact('angsuran', 'anggota'));
    }

    /**
     * Memproses pembaruan data angsuran.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_bayar' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        $angsuran = Angsuran::findOrFail($id);
        $angsuran->update([
            'tanggal_bayar' => $request->tanggal_bayar,
            'anggota_id' => $request->anggota_id,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('angsuran.index')->with('success', 'Data Angsuran berhasil diperbarui!');
    }

    /**
     * Menghapus data angsuran.
     */
    public function destroy($id)
    {
        $angsuran = Angsuran::findOrFail($id);
        $angsuran->delete();

        return redirect()->route('angsuran.index')->with('success', 'Data Angsuran berhasil dihapus!');
    }
}