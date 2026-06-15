@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between d-print-none">
        <h5 class="fw-bold text-dark mb-0">Laporan Data Anggota</h5>
        <button onclick="window.print()" class="btn btn-success btn-sm">
            <i class="fa-solid fa-print me-1"></i> Cetak PDF / Kertas
        </button>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1">LAPORAN DATA ANGGOTA KOPERASI</h4>
            <p class="text-muted small">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
        </div>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th width="80">ID Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="fw-semibold">{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telepon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection