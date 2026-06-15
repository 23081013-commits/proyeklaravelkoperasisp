@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm max-width-md">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold text-dark mb-0">Tambah Transaksi Simpanan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('simpanan.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="tanggal" class="form-label small fw-bold">Tanggal Transaksi</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-y')) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="anggota_id" class="form-label small fw-bold">Pilih Anggota</label>
                <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror">
                    <option value="">-- Pilih Anggota Koperasi --</option>
                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}" {{ old('anggota_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->id }} - {{ $user->nama }}
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
                    <option value="Simpanan Pokok" {{ old('jenis_simpanan') == 'Simpanan Pokok' ? 'selected' : '' }}>Simpanan Pokok</option>
                    <option value="Simpanan Wajib" {{ old('jenis_simpanan') == 'Simpanan Wajib' ? 'selected' : '' }}>Simpanan Wajib</option>
                    <option value="Simpanan Sukarela" {{ old('jenis_simpanan') == 'Simpanan Sukarela' ? 'selected' : '' }}>Simpanan Sukarela</option>
                </select>
                @error('jenis_simpanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label small fw-bold">Jumlah Uang (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Contoh: 50000" value="{{ old('jumlah') }}">
                @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('simpanan.index') }}" class="btn btn-light btn-sm">Batal</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan Transaksi</button>
            </div>
        </form>
    </div>
</div>
@endsection