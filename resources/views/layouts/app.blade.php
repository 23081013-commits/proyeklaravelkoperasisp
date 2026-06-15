<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}"><i class="fa-solid fa-wallet text-white me-2"></i>Koperasi SP</a>
            <div class="d-flex">
                <span class="navbar-text text-white me-3">Halo, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger text-white fw-bold">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="bg-white border-bottom py-2 shadow-sm mb-4">
        <div class="container d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm fw-semibold"><i class="fa-solid fa-chart-line me-1"></i> Dashboard</a>
            <a href="{{ route('anggota.index') }}" class="btn btn-outline-primary btn-sm fw-semibold"><i class="fa-solid fa-users me-1"></i> Data Anggota</a>
            <a href="{{ route('simpanan.index') }}" class="btn btn-outline-primary btn-sm fw-semibold"><i class="fa-solid fa-money-bill-wave me-1"></i> Simpanan</a>
            <a href="{{ route('pinjaman.index') }}" class="btn btn-outline-primary btn-sm fw-semibold"><i class="fa-solid fa-hand-holding-dollar me-1"></i> Pinjaman</a>
            <a href="{{ route('angsuran.index') }}" class="btn btn-outline-primary btn-sm fw-semibold"><i class="fa-solid fa-file-invoice-dollar me-1"></i> Angsuran</a>
        </div>
    </div>

    <div class="container mt-4">
        @if(isset($jumlah_anggota))
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 bg-white shadow-sm p-3 rounded-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-primary bg-opacity-10 rounded-3 text-primary me-3">
                            <i class="fa-solid fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Anggota</h6>
                            <h4 class="fw-bold mb-0">{{ $jumlah_anggota }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 bg-white shadow-sm p-3 rounded-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-success bg-opacity-10 rounded-3 text-success me-3">
                            <i class="fa-solid fa-money-bill-wave fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Simpanan</h6>
                            <h4 class="fw-bold mb-0">Rp{{ number_format($total_simpanan, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 bg-white shadow-sm p-3 rounded-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-danger bg-opacity-10 rounded-3 text-danger me-3">
                            <i class="fa-solid fa-hand-holding-dollar fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Pinjaman</h6>
                            <h4 class="fw-bold mb-0">Rp{{ number_format($total_pinjaman, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 bg-white shadow-sm p-3 rounded-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-warning bg-opacity-10 rounded-3 text-warning me-3">
                            <i class="fa-solid fa-file-invoice-dollar fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Angsuran</h6>
                            <h4 class="fw-bold mb-0">Rp{{ number_format($total_angsuran, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>