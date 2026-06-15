<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Anggota;

class PinjamanController extends Controller
{
    /**
     * Menampilkan daftar pinjaman & Fitur 6 (Pencarian Data Pinjaman).
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        // Mengambil data pinjaman, jika ada keyword akan memfilter berdasarkan nama anggota
        $pinjaman = Pinjaman::with('anggota')
            ->when($keyword, function ($query, $keyword) {
                return $query->whereHas('anggota', function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->get();

        return view('pinjaman.index', compact('pinjaman', 'keyword'));
    }

    /**
     * Menampilkan form tambah pinjaman.
     */
    public function create()
    {
        $anggota = Anggota::all();
        return view('pinjaman.create', compact('anggota'));
    }

    /**
     * Menyimpan data pinjaman baru + Validasi form.
     */
    public function store(Request $request)
    {
        // Terapkan validasi form sesuai ketentuan di gambar
        $request->validate([
            'tanggal_pinjaman' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id',
            'jumlah_pinjaman' => 'required|numeric|min:0',
            'lama_angsuran' => 'required|integer|min:1', // Dalam hitungan bulan
        ]);

        Pinjaman::create([
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'anggota_id' => $request->anggota_id,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'lama_angsuran' => $request->lama_angsuran,
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Data Pinjaman berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit data pinjaman.
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $anggota = Anggota::all();
        return view('pinjaman.edit', compact('pinjaman', 'anggota'));
    }

    /**
     * Memproses pembaruan data pinjaman.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pinjaman' => 'required|date',
            'anggota_id' => 'required|exists:anggotas,id',
            'jumlah_pinjaman' => 'required|numeric|min:0',
            'lama_angsuran' => 'required|integer|min:1',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update([
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'anggota_id' => $request->anggota_id,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'lama_angsuran' => $request->lama_angsuran,
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Data Pinjaman berhasil diperbarui!');
    }

    /**
     * Menghapus data pinjaman.
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return redirect()->route('pinjaman.index')->with('success', 'Data Pinjaman berhasil dihapus!');
    }
}