<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    // 1. Menampilkan Semua Data Anggota
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    // 2. Menyimpan Data Anggota Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'telepon'=> 'required',
            'alamat' => 'required',
        ]);

        // Masukkan hanya kolom yang terbukti ada di phpMyAdmin kamu, Din!
        DB::table('anggotas')->insert([
            'nama'       => $request->nama,
            'alamat'     => $request->alamat,
            'no_telepon' => $request->telepon, // Menyesuaikan nama kolom database: no_telepon
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // 3. Mengubah Data Anggota
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'telepon' => 'required',
            'alamat'  => 'required',
        ]);

        // Menggunakan DB Builder update agar aman dengan kolom yang ada
        DB::table('anggotas')->where('id', $id)->update([
            'nama'       => $request->nama,
            'alamat'     => $request->alamat,
            'no_telepon' => $request->telepon,
            'updated_at' => now(),
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    // 4. Menghapus Data Anggota
    public function destroy($id)
    {
        DB::table('anggotas')->where('id', $id)->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}