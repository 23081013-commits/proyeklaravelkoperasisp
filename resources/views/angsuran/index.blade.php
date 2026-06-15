@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold text-dark mb-0">Data Pembayaran Angsuran</h5>
        <a href="{{ route('angsuran.create') }}" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus me-1"></i> Bayar Angsuran
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>Tanggal Bayar</th>
                        <th>Nama Anggota</th>
                        <th>Jumlah Bayar</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($angsuran as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}</td>
                            <td class="fw-semibold">{{ $item->anggota->nama ?? 'Anggota Terhapus' }}</td>
                            <td class="text-primary fw-bold">Rp{{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('angsuran.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('angsuran.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat angsuran ini?')">
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
                            <td colspan="5" class="text-center text-muted py-4">Belum ada transaksi pembayaran angsuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection