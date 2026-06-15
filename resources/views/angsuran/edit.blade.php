@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold text-dark mb-0">Edit Pembayaran Angsuran</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('angsuran.update', $angsuran->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="tanggal_bayar" class="form-label small fw-bold">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control @error('tanggal_bayar') is-invalid @enderror" value="{{ old('tanggal_bayar', $angsuran->tanggal_bayar) }}">
                @error('tanggal_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="anggota_id" class="form-label small fw-bold">Pilih Anggota</label>
                <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror">
                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}" {{ old('anggota_id', $angsuran->anggota_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('anggota_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_bayar" class="form-label small fw-bold">Jumlah Bayar (Rp)</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" value="{{ old('jumlah_bayar', $angsuran->jumlah_bayar) }}">
                @error('jumlah_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('angsuran.index') }}" class="btn btn-light btn-sm">Batal</a>
                <button type="submit" class="btn btn-warning btn-sm text-white">Perbarui Pembayaran</button>
            </div>
        </form>
    </div>
</div>
@endsection