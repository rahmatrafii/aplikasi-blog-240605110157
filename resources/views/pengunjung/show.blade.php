@extends('layouts.pengunjung')

@section('title', $artikel->judul)

@section('content')
    <!-- Remah Roti (Breadcrumbs) -->
    <div class="breadcrumb-custom">
        <a href="{{ route('pengunjung.index') }}">Beranda</a>
        <i class="fa-solid fa-chevron-right text-muted opacity-50" style="font-size: 0.75rem;"></i>
        <a href="{{ route('pengunjung.index', ['kategori' => $artikel->id_kategori]) }}" style="text-transform: capitalize;">
            {{ $artikel->kategori->nama_kategori ?? 'Umum' }}
        </a>
        <i class="fa-solid fa-chevron-right text-muted opacity-50" style="font-size: 0.75rem;"></i>
        <span class="active-crumb">{{ $artikel->judul }}</span>
    </div>

    <!-- Article Content -->
    <article class="card card-premium p-4 p-md-5">
        <!-- Category Badge -->
        <div class="mb-3">
            <a href="{{ route('pengunjung.index', ['kategori' => $artikel->id_kategori]) }}" class="badge-premium-category">
                {{ $artikel->kategori->nama_kategori ?? 'Umum' }}
            </a>
        </div>

        <!-- Title -->
        <h1 class="mb-3" style="color: var(--text-primary); font-weight: 800; font-size: 2.5rem; line-height: 1.25; letter-spacing: -0.025em;">
            {{ $artikel->judul }}
        </h1>

        <!-- Author info & Date (Modernized) -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pb-3 mb-4 border-bottom" style="border-color: rgba(241, 245, 249, 0.8) !important;">
            <div class="d-flex align-items-center gap-2">
                @php
                    $initial = strtoupper(substr($artikel->penulis->nama_depan ?? 'A', 0, 1));
                    $bgColors = ['#4f46e5', '#06b6d4', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'];
                    $colorIndex = (ord($initial) - ord('A')) % count($bgColors);
                    $bgColor = $bgColors[$colorIndex] ?? '#4f46e5';
                @endphp
                <div class="author-circle-sm" style="background-color: {{ $bgColor }};">
                    {{ $initial }}
                </div>
                <div>
                    <span class="text-dark fw-semibold" style="font-size: 0.875rem;">
                        {{ ($artikel->penulis->nama_depan ?? '') . ' ' . ($artikel->penulis->nama_belakang ?? '') }}
                    </span>
                    <span class="text-muted mx-2" style="font-size: 0.8rem;">&bull;</span>
                    <span class="text-muted" style="font-size: 0.8rem;">Penulis</span>
                </div>
            </div>
            <div class="text-muted d-flex align-items-center gap-1.5" style="font-size: 0.85rem;">
                <i class="fa-regular fa-calendar-days text-muted opacity-75"></i>
                <span>{{ $artikel->tanggal_wib }}</span>
            </div>
        </div>

        <!-- Featured Image (Below Title & Metadata) -->
        <div class="mb-5 rounded-4 overflow-hidden shadow-sm img-zoom-container" style="max-height: 480px; background: linear-gradient(135deg, #f1f5f9 0%, #cbd5e1 100%);">
            @if($artikel->gambar && file_exists(public_path('storage/gambar/' . $artikel->gambar)))
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid w-100 h-100 object-fit-cover">
            @elseif($artikel->gambar && file_exists(public_path('uploads/gambar/' . $artikel->gambar)))
                <img src="{{ asset('uploads/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid w-100 h-100 object-fit-cover">
            @else
                <!-- Fallback Image Box -->
                <div class="d-flex justify-content-center align-items-center text-muted" style="height: 300px;">
                    <i class="fa-solid fa-image fa-4x opacity-50"></i>
                </div>
            @endif
        </div>

        <!-- Article Body -->
        <div class="article-body-custom">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
    </article>
@endsection

@section('sidebar')
    <!-- Related Articles Widget -->
    <div class="widget-premium">
        <h3 class="widget-title-custom">Artikel Terkait</h3>
        <div class="d-flex flex-column">
            @forelse($artikelTerkait as $terkait)
                <a href="{{ route('pengunjung.show', $terkait->id) }}" class="d-flex gap-3 align-items-center p-2 mb-3 text-decoration-none border-bottom pb-3 related-article-item" style="border-color: rgba(241, 245, 249, 0.8) !important;">
                    <!-- Thumbnail -->
                    <div class="img-zoom-container" style="width: 80px; height: 60px; border-radius: 8px; overflow: hidden; flex-shrink: 0; background: linear-gradient(135deg, #f1f5f9 0%, #cbd5e1 100%);">
                        @if($terkait->gambar && file_exists(public_path('storage/gambar/' . $terkait->gambar)))
                            <img src="{{ asset('storage/gambar/' . $terkait->gambar) }}" alt="{{ $terkait->judul }}" class="w-100 h-100 object-fit-cover">
                        @elseif($terkait->gambar && file_exists(public_path('uploads/gambar/' . $terkait->gambar)))
                            <img src="{{ asset('uploads/gambar/' . $terkait->gambar) }}" alt="{{ $terkait->judul }}" class="w-100 h-100 object-fit-cover">
                        @else
                            <!-- Fallback Thumbnail Icon -->
                            <div class="d-flex justify-content-center align-items-center w-100 h-100 text-muted">
                                <i class="fa-solid fa-image opacity-50" style="font-size: 1.25rem;"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Title & Date -->
                    <div>
                        <h4 class="mb-1 related-title" style="font-size: 0.9rem; font-weight: 600; color: var(--text-primary); line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.25s ease;">
                            {{ $terkait->judul }}
                        </h4>
                        <span class="text-muted d-flex align-items-center gap-1" style="font-size: 0.75rem;">
                            <i class="fa-regular fa-calendar-days text-muted opacity-50" style="font-size: 0.7rem;"></i>
                            {{ $terkait->tanggal_short }}
                        </span>
                    </div>
                </a>
            @empty
                <div class="text-center py-4 text-muted">
                    <i class="fa-solid fa-circle-info fa-2x opacity-25 mb-2"></i>
                    <p class="mb-0 small">Tidak ada artikel terkait dalam kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
