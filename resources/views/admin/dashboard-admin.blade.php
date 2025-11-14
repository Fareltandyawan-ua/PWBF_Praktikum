@extends('layouts.lte.main')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    .stat-card {
        border-radius: 12px;
        padding: 25px;
        color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,.15);
        transition: transform .2s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .menu-card {
        border-radius: 12px;
        padding: 22px;
        background: #fff;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,.1);
        transition: .2s;
        cursor: pointer;
    }
    .menu-card:hover {
        background: #f5f6f7;
        transform: translateY(-4px);
    }
    .menu-card i {
        font-size: 35px;
        margin-bottom: 12px;
        color: #0d6efd;
    }
    .menu-title {
        font-size: 15px;
        font-weight: 600;
        margin-top: 10px;
    }
</style>

<div class="container">

    <!-- WELCOME SECTION -->
    <div class="mb-4">
        <h2 class="fw-bold">
            Selamat datang, {{ session('user_name') }} 👋
        </h2>
        <p class="text-muted">Anda login sebagai <strong>{{ session('user_role_name') }}</strong></p>
    </div>

    <div class="row g-4">

        <!-- Statistik Cards -->
        <div class="col-md-3">
            <div class="stat-card" style="background: #0d6efd;">
                <h4>Total User</h4>
                <h2>{{ $totalUser ?? 0 }}</h2>
                <i class="fa-solid fa-users fa-2x"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: #198754;">
                <h4>Total Pet</h4>
                <h2>{{ $totalPet ?? 0 }}</h2>
                <i class="fa-solid fa-dog fa-2x"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: #6f42c1;">
                <h4>Jenis Hewan</h4>
                <h2>{{ $totalJenisHewan ?? 0 }}</h2>
                <i class="fa-solid fa-paw fa-2x"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: #fd7e14;">
                <h4>Total Ras</h4>
                <h2>{{ $totalRas ?? 0 }}</h2>
                <i class="fa-solid fa-cat fa-2x"></i>
            </div>
        </div>

    </div>

    <!-- MENU NAVIGATION -->
    <!-- <div class="mt-5">
        <h4 class="fw-bold mb-3">Navigasi Cepat</h4>

        <div class="row g-3">

            <div class="col-md-3">
                <a href="{{ route('admin.jenis-hewan.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-paw"></i>
                        <div class="menu-title">Jenis Hewan</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.kategori.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-layer-group"></i>
                        <div class="menu-title">Kategori</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.kategori-klinis.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-notes-medical"></i>
                        <div class="menu-title">Kategori Klinis</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.kode-tindakan-terapi.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-file-medical"></i>
                        <div class="menu-title">Kode Tindakan</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.pemilik.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-user"></i>
                        <div class="menu-title">Pemilik</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.pet.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-dog"></i>
                        <div class="menu-title">Pet</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.ras-hewan.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-cat"></i>
                        <div class="menu-title">Ras Hewan</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.user.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-users"></i>
                        <div class="menu-title">User</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.role.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-id-badge"></i>
                        <div class="menu-title">Role</div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('admin.role-user.index') }}">
                    <div class="menu-card">
                        <i class="fa-solid fa-users-gear"></i>
                        <div class="menu-title">Role User</div>
                    </div>
                </a>
            </div>

        </div>
    </div> -->

</div>

@endsection
