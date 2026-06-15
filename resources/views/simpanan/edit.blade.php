@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold text-dark mb-0">Edit Transaksi Simpanan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('simpanan.update', $simpanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="tanggal" class="form-label small fw-bold">Tanggal Transaksi</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $simpanan->tanggal) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="anggota_id" class="form-label small fw-bold">Pilih Anggota</label>
                <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror">
                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}" {{ old('anggota_id', $simpanan->anggota_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('anggota_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_simpanan" class="form-label small fw-bold">Jenis Simpanan</label>
                <select name="jenis_simpanan" id="jenis_simpanan" class="form-select @error('jenis_simpanan') is-invalid @enderror">
                    <option value="Simpanan Pokok" {{ old('jenis_simpanan', $simpanan->jenis_simpanan) == 'Simpanan Pokok' ? 'selected' : '' }}>Simpanan Pokok</option>
                    <option value="Simpanan Wajib" {{ old('jenis_simpanan', $simpanan->jenis_simpanan) == 'Simpanan Wajib' ? 'selected' : '' }}>Simpanan Wajib</option>
                    <option value="Simpanan Sukarela" {{ old('jenis_simpanan', $simpanan->jenis_simpanan) == 'Simpanan Sukarela' ? 'selected' : '' }}>Simpanan Sukarela</option>
                </select>
                @error('jenis_simpanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label small fw-bold">Jumlah Uang (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $simpanan->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('simpanan.index') }}" class="btn btn-light btn-sm">Batal</a>
                <button type="submit" class="btn btn-warning btn-sm text-white">Perbarui Transaksi</button>
            </div>
        </form>
    </div>
</div>
@endsection