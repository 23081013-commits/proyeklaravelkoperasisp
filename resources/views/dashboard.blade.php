@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="p-4 bg-white rounded shadow-sm">
            <h2 class="fw-bold text-dark mb-1">Dashboard Utama</h2>
            <p class="text-muted mb-0">Selamat datang kembali di Sistem Informasi Koperasi Simpan Pinjam.</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm bg-primary text-white h-100">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-uppercase mb-2 small text-white-50 fw-bold">Jumlah Anggota</h6>
                    <h2 class="fw-bold mb-0">{{ $jumlah_anggota }}</h2>
                </div>
                <div class="fs-1 text-white-50">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-uppercase mb-2 small text-white-50 fw-bold">Total Simpanan</h6>
                    <h3 class="fw-bold mb-0">Rp{{ number_format($total_simpanan, 0, ',', '.') }}</h3>
                </div>
                <div class="fs-1 text-white-50">
                    <i class="fa-solid fa-piggy-bank"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm bg-danger text-white h-100">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-uppercase mb-2 small text-white-50 fw-bold">Total Pinjaman</h6>
                    <h3 class="fw-bold mb-0">Rp{{ number_format($total_pinjaman, 0, ',', '.') }}</h3>
                </div>
                <div class="fs-1 text-white-50">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm bg-warning text-dark h-100">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-uppercase mb-2 small text-dark-50 fw-bold">Total Angsuran</h6>
                    <h3 class="fw-bold mb-0 text-dark">Rp{{ number_format($total_angsuran, 0, ',', '.') }}</h3>
                </div>
                <div class="fs-1 text-dark-50">
                    <i class="fa-solid fa-receipt"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection