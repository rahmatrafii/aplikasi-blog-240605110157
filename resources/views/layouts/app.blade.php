<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Blog')</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --dark-navy: #1e2530;
            --cms-bg-body: #f4f4f9;
            --cms-header-bg: #2C3E50;
            --cms-sidebar-bg: #ffffff;
            --cms-active-bg: #e8f5e9;
            --cms-active-text: #2e7d32;
            --cms-active-border: #4CAF50;
            --cms-text-main: #212529;
            --cms-text-muted: #868e96;
            --cms-border-color: #f0f0f0;
            --cms-shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --cms-radius-md: 12px;
        }

        /* Navbar Kustom */
        .navbar-dark-blog {
            background-color: var(--dark-navy) !important;
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
        }

        .navbar-dark-blog .brand-title {
            color: #ffffff;
            font-weight: 800;
            font-size: 1.4rem;
            margin-bottom: 0.15rem;
            line-height: 1.2;
            text-decoration: none;
            display: block;
            letter-spacing: -0.025em;
            transition: color 0.25s ease;
        }

        .navbar-dark-blog .navbar-brand:hover .brand-title {
            color: #10b981;
        }

        .navbar-dark-blog .brand-subtitle {
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 400;
            margin-bottom: 0;
            line-height: 1.2;
            letter-spacing: 0.01em;
        }

        .navbar-dark-blog .brand-logo-svg {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), filter 0.4s ease;
        }

        .navbar-dark-blog .navbar-brand:hover .brand-logo-svg {
            transform: scale(1.08) rotate(-5deg);
            filter: drop-shadow(0 4px 12px rgba(16, 185, 129, 0.5));
        }

        .navbar-dark-blog .nav-icon-svg {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .navbar-dark-blog .nav-link-custom:hover .nav-icon-svg,
        .navbar-dark-blog .nav-link-custom.active .nav-icon-svg {
            transform: translateY(-2px) scale(1.05);
        }

        .navbar-dark-blog .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1.1rem !important;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-dark-blog .nav-link-custom:hover, 
        .navbar-dark-blog .nav-link-custom.active {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Modern Custom Pill Call to Action for Admin Login */
        .navbar-dark-blog .nav-link-login-custom {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            padding: 0.5rem 1.25rem !important;
            border-radius: 50px !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .navbar-dark-blog .nav-link-login-custom:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--cms-bg-body);
            color: var(--cms-text-main);
            font-size: 14px;
        }

        .header {
            background-color: var(--cms-header-bg);
            color: #ffffff;
            padding: 12px 20px;
            box-shadow: var(--cms-shadow-sm);
        }

        .header-title {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
        }

        .header-sub {
            font-size: 11px;
            color: #aaaaaa;
            margin: 0;
        }

        .sidebar {
            width: 220px;
            min-height: calc(100vh - 88px);
            background-color: var(--cms-sidebar-bg);
            border-right: 1px solid var(--cms-border-color);
            padding: 16px 0;
            flex-shrink: 0;
        }

        .avatar-area {
            padding: 0 16px 16px;
            border-bottom: 1px solid var(--cms-border-color);
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .avatar-circle {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffffff;
            box-shadow: var(--cms-shadow-sm);
            margin-bottom: 8px;
            transition: transform 0.2s ease;
        }

        .avatar-circle:hover {
            transform: scale(1.05);
        }

        .avatar-greeting {
            font-size: 11px;
            color: var(--cms-text-muted);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .avatar-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--cms-text-main);
            margin: 2px 0 0;
        }

        .sidebar-label {
            font-size: 10px;
            color: var(--cms-text-muted);
            padding: 8px 16px 8px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
        }

        .sidebar .nav-item {
            padding: 10px 16px;
            margin: 2px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #555555;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar .nav-item:hover {
            background-color: var(--cms-bg-body);
            color: var(--cms-text-main);
            padding-left: 20px;
        }

        .sidebar .nav-item.active {
            background-color: var(--cms-active-bg);
            color: var(--cms-active-text);
            font-weight: 600;
        }

        .sidebar-bottom {
            padding: 16px 16px 0;
            border-top: 1px solid var(--cms-border-color);
            margin-top: auto;
        }

        .sidebar-bottom button {
            transition: all 0.2s ease;
        }

        .sidebar-bottom button:hover {
            background-color: #ffe0e0 !important;
            color: #b02a1e !important;
            border-color: #e8b0b0 !important;
            transform: translateY(-1px);
        }

        .main-content {
            flex: 1;
            padding: 24px;
        }

        /* Glow Focus Form Control */
        .form-control, .form-select {
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--cms-active-border) !important;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.15) !important;
        }

        /* Media Query Responsif Mobile */
        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column !important;
            }
            .sidebar {
                width: 100%;
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid var(--cms-border-color);
                padding: 12px 10px;
            }
            .avatar-area {
                flex-direction: row;
                align-items: center;
                text-align: left;
                padding: 0 10px 12px;
                gap: 12px;
                border-bottom: 1px solid var(--cms-border-color);
                margin-bottom: 8px;
            }
            .avatar-circle {
                width: 40px;
                height: 40px;
                margin-bottom: 0;
            }
            .avatar-name {
                margin: 0;
            }
            .sidebar-label {
                padding: 6px 10px 4px;
            }
            .sidebar .nav-item {
                margin: 2px 0;
                padding: 8px 12px;
            }
            .sidebar .nav-item:hover {
                padding-left: 16px;
            }
            .sidebar-bottom {
                padding: 12px 10px 0;
                border-top: 1px solid var(--cms-border-color);
                margin-top: 10px;
            }
            .main-content {
                padding: 16px;
            }
        }

        /* Custom Premium & Compact Pagination for Admin */
        .pagination {
            gap: 6px;
        }

        .pagination .page-item .page-link {
            border: none;
            color: var(--cms-text-main);
            background-color: #ffffff;
            border: 1px solid var(--cms-border-color);
            border-radius: 8px !important;
            padding: 6px 12px;
            font-size: 0.85rem;
            font-weight: 600;
            min-width: 34px;
            text-align: center;
            box-shadow: var(--cms-shadow-sm);
            transition: all 0.2s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--cms-active-border) !important;
            border-color: var(--cms-active-border) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: var(--cms-bg-body);
            border-color: #cccccc;
            color: var(--cms-active-text);
            transform: translateY(-1px);
        }

        .pagination .page-item.disabled .page-link {
            background-color: #fafafa;
            border-color: var(--cms-border-color);
            color: var(--cms-text-muted);
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    @include('layouts.partials.navbar')
    <div class="d-flex">
        <div class="sidebar d-flex flex-column">
            <div class="avatar-area">
                <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt="Foto Profil" class="avatar-circle">
                <p class="avatar-greeting">Halo,</p>
                <p class="avatar-name">
                    {{ Auth::user()->nama_depan }}
                    {{ Auth::user()->nama_belakang }}
                </p>
            </div>
            <div class="sidebar-label">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="{{ route('artikel.index') }}"
                class="nav-item {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Kelola Artikel
            </a>
            <a href="{{ route('penulis.index') }}"
                class="nav-item {{ request()->routeIs('penulis.*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-tie"></i> Kelola Penulis
            </a>
            <a href="{{ route('kategori.index') }}"
                class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="fa-solid fa-tags"></i> Kelola Kategori
            </a>
            <div class="sidebar-bottom mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2"
                        style="background-color: #fff0f0; color: #c0392b; border: 1px solid #f5c6c6; border-radius: 8px; padding: 8px 12px; font-weight: 500;">
                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
        <div class="main-content">
            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 8px;">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('gagal'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 8px;">
                    <i class="fa-solid fa-circle-xmark me-2"></i> {{ session('gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
