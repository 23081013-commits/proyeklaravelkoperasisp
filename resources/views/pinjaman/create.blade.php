@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">Form Tambah Pinjaman</h4>
        <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <h6 class="fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>Gagal Menyimpan Transaksi:</h6>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('pinjaman.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pilih Anggota Koperasi</label>
                    <select name="anggota_id" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Anggota --</option>
                        @foreach($anggota as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Pinjaman</label>
                    <input type="date" name="tanggal_pinjaman" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jumlah Pinjaman (Rp)</label>
                    <input type="number" name="jumlah_pinjaman" class="form-control" placeholder="Contoh: 1000000" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Lama Angsuran (Bulan)</label>
                    <select name="lama_angsuran" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Jangka Waktu --</option>
                        <option value="3">3 Bulan</option>
                        <option value="6">6 Bulan</option>
                        <option value="12">12 Bulan</option>
                        <option value="24">24 Bulan</option>
                    </select>
                </div>

                <hr class="text-muted my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Transaksi
                    </button>
                    <a href="{{ route('pinjaman.index') }}" class="btn btn-light px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection