@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold text-dark mb-0">Data Simpanan Anggota</h5>
        <a href="{{ route('simpanan.create') }}" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus me-1"></i> Tambah Simpanan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Tanggal</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($simpanan as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="fw-semibold">{{ $item->anggota->nama ?? 'Anggota Terhapus' }}</td>
                            <td><span class="badge bg-info text-dark">{{ $item->jenis_simpanan }}</span></td>
                            <td class="text-success fw-bold">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('simpanan.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('simpanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat simpanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data transaksi simpanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection