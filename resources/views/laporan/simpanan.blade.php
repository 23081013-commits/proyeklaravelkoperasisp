@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between d-print-none">
        <h5 class="fw-bold text-dark mb-0">Laporan Rekapitulasi Simpanan</h5>
        <button onclick="window.print()" class="btn btn-success btn-sm">
            <i class="fa-solid fa-print me-1"></i> Cetak PDF / Kertas
        </button>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1">LAPORAN REKAPITULASI SIMPANAN ANGGOTA</h4>
            <p class="text-muted small">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
        </div>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th width="60">No</th>
                    <th>Tanggal</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Simpanan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($simpanan as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td class="fw-semibold">{{ $item->anggota->nama ?? 'N/A' }}</td>
                        <td>{{ $item->jenis_simpanan }}</td>
                        <td class="text-dark fw-bold">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection