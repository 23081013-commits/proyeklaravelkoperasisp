@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between d-print-none">
        <h5 class="fw-bold text-dark mb-0">Laporan Rekapitulasi Pinjaman</h5>
        <button onclick="window.print()" class="btn btn-success btn-sm">
            <i class="fa-solid fa-print me-1"></i> Cetak PDF / Kertas
        </button>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1">LAPORAN REKAPITULASI PINJAMAN ANGGOTA</h4>
            <p class="text-muted small">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
        </div>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th width="60">No</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Nama Anggota</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Lama Angsuran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pinjaman as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjaman)->format('d-m-Y') }}</td>
                        <td class="fw-semibold">{{ $item->anggota->nama ?? 'N/A' }}</td>
                        <td class="text-dark fw-bold">Rp{{ number_format($item->jumlah_pinjaman, 0, ',', '.') }}</td>
                        <td>{{ $item->lama_angsuran }} Bulan</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection