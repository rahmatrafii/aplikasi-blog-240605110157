<nav class="navbar navbar-expand-lg navbar-dark-blog sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('pengunjung.index') }}" style="text-decoration: none;">
            <!-- SVG Logo Modern & Keren -->
            <svg class="brand-logo-svg" width="38" height="38" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="logo-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#10b981" />
                        <stop offset="100%" stop-color="#3b82f6" />
                    </linearGradient>
                </defs>
                <!-- Outer rounded hexagon or circle -->
                <rect width="40" height="40" rx="12" fill="url(#logo-grad)" />
                <!-- Modern overlapping paths forming a stylized 'B' and 'K' / Book pages -->
                <path d="M12 11H20.5C22.9853 11 25 12.3431 25 15C25 16.5 24 17.5 22 18.5C24.5 19.5 26 21 26 23.5C26 26.1569 23.9853 27.5 21.5 27.5H12V11Z" fill="white" fill-opacity="0.15" />
                <path d="M15 14H20.5C21.8807 14 23 14.6716 23 16C23 17.3284 21.8807 18 20.5 18H15V14ZM15 20.5H21.5C22.8807 20.5 24 21.1716 24 22.5C24 23.8284 22.8807 24.5 21.5 24.5H15V20.5Z" fill="white" />
                <!-- Glowing node / dot -->
                <circle cx="20.5" cy="16" r="1.5" fill="#10b981" />
                <circle cx="21.5" cy="22.5" r="1.5" fill="#3b82f6" />
            </svg>
            <div class="d-flex flex-column align-items-start">
                <span class="brand-title m-0">Blog Kami</span>
                <span class="brand-subtitle m-0">Wawasan, tips, dan cerita inspiratif untuk Anda</span>
            </div>
        </a>
        <button class="navbar-toggler d-lg-none btn btn-link border-0 text-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-2 mt-3 mt-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom d-flex align-items-center gap-2 {{ request()->routeIs('pengunjung.index') && !request()->query('kategori') ? 'active' : '' }}" href="{{ route('pengunjung.index') }}">
                        <!-- Home Icon SVG -->
                        <svg class="nav-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Beranda</span>
                    </a>
                </li>

                @auth
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link nav-link-custom d-flex align-items-center gap-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt="Foto Profil" class="rounded-circle" style="width: 28px; height: 28px; object-fit: cover; border: 1px solid rgba(255,255,255,0.2);">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2" style="border-radius: 8px; min-width: 180px;">
                            <li class="px-3 py-2 border-bottom">
                                <p class="mb-0 fw-semibold text-dark">{{ Auth::user()->nama_depan }}</p>
                                <small class="text-muted">Administrator</small>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center gap-2 mt-1" href="{{ route('dashboard') }}" style="border-radius: 6px;">
                                    <i class="fa-solid fa-chart-pie text-muted"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-2 pb-1">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger d-flex align-items-center gap-2" style="border-radius: 6px; border: none; background: none; width: 100%; text-align: left;">
                                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom nav-link-login-custom" href="{{ route('login') }}">
                            <!-- Key/Lock Icon SVG -->
                            <svg class="nav-icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>Login Admin</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
