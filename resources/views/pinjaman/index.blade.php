@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">Manajemen Data Pinjaman</h4>
        <a href="{{ route('pinjaman.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-hand-holding-dollar me-2"></i>Tambah Pinjaman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pinjaman as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold text-start">{{ $row->nama ?? 'Nama Tidak Ditemukan' }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td class="text-end fw-bold text-danger">Rp{{ number_format($row->jumlah, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('pinjaman.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pinjaman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-muted p-4">Belum ada data transaksi pinjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection