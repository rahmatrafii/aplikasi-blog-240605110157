@extends('layouts.pengunjung')

@section('title', 'Beranda Blog')

@section('content')
    <!-- Hero Welcome Section -->
    @if(empty($selectedKategoriIds))
    <div class="p-4 mb-4 rounded-4 position-relative overflow-hidden shadow-sm" style="background: linear-gradient(135deg, #1e2530 0%, #0f172a 100%); color: white; border: 1px solid rgba(255, 255, 255, 0.05);">
        <div class="position-absolute top-0 end-0 opacity-10 p-4" style="font-size: 4.5rem; pointer-events: none;">
            <i class="fa-solid fa-pen-nib"></i>
        </div>
        <div class="position-relative z-1">
            <span class="badge mb-2 text-uppercase fw-bold letter-spacing-1" style="background-color: rgba(16, 185, 129, 0.2); color: #10b981; font-size: 0.75rem; padding: 6px 12px; border-radius: 6px;">
                <i class="fa-solid fa-quote-left me-1"></i> Blog Inspirasi & Wawasan
            </span>
            <h1 class="h3 fw-bold mb-2" style="letter-spacing: -0.02em;">Temukan Wawasan & Inspirasi Baru</h1>
            <p class="mb-0" style="font-size: 0.95rem; color: #cbd5e1; max-width: 580px; line-height: 1.5;">
                Jelajahi ragam artikel menarik, tips bermanfaat, opini, dan wawasan hangat dari berbagai topik pilihan untuk memperluas cakrawala Anda.
            </p>
        </div>
    </div>
    @endif

    <!-- Active Filter Indicator -->
    @if(!empty($selectedKategoriIds))
        @php
            $kategoriAktifList = $kategori->whereIn('id', $selectedKategoriIds)->pluck('nama_kategori')->toArray();
            $kategoriAktifText = implode(', ', array_map('ucfirst', $kategoriAktifList));
        @endphp
        <div class="alert alert-success d-flex justify-content-between align-items-center mb-4 rounded-3 border-0 shadow-sm" style="background-color: rgba(16, 185, 129, 0.08); color: #065f46;">
            <div>
                <i class="fa-solid fa-filter me-2"></i>
                Menampilkan artikel dalam kategori: <strong>{{ $kategoriAktifText ?: 'Tidak Diketahui' }}</strong>
            </div>
            <a href="{{ route('pengunjung.index') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">
                <i class="fa-solid fa-times me-1"></i> Bersihkan Filter
            </a>
        </div>
    @endif

    <!-- Articles List -->
    <div class="d-flex flex-column gap-5">
        @forelse($artikel as $item)
            <article class="card card-premium card-premium-hover">
                <!-- Article Image (Top Stacked) with zoom effect container -->
                <div class="img-zoom-container" style="height: 250px; background: linear-gradient(135deg, #f1f5f9 0%, #cbd5e1 100%); overflow: hidden; position: relative;">
                    <!-- Floating category badge -->
                    <div class="position-absolute top-0 start-0 m-3 z-3">
                        <a href="{{ route('pengunjung.index', ['kategori' => $item->id_kategori]) }}" class="badge-premium-category">
                            {{ $item->kategori->nama_kategori ?? 'Umum' }}
                        </a>
                    </div>

                    @if($item->gambar && file_exists(public_path('storage/gambar/' . $item->gambar)))
                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover">
                    @elseif($item->gambar && file_exists(public_path('uploads/gambar/' . $item->gambar)))
                        <img src="{{ asset('uploads/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover">
                    @else
                        <!-- Fallback Elegant Icon -->
                        <div class="d-flex justify-content-center align-items-center w-100 h-100 text-muted">
                            <i class="fa-solid fa-image fa-3x opacity-50"></i>
                        </div>
                    @endif
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 40%; background: linear-gradient(to top, rgba(0,0,0,0.15), rgba(0,0,0,0)); pointer-events: none;"></div>
                </div>
                
                <!-- Article Body -->
                <div class="card-body p-4 d-flex flex-column">
                    <!-- Author & Date Section (Modernized) -->
                    @php
                        $initial = strtoupper(substr($item->penulis->nama_depan ?? 'A', 0, 1));
                        $bgColors = ['#4f46e5', '#06b6d4', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'];
                        $colorIndex = (ord($initial) - ord('A')) % count($bgColors);
                        $bgColor = $bgColors[$colorIndex] ?? '#4f46e5';
                    @endphp
                    <div class="d-flex align-items-center gap-2 mb-3 text-muted flex-wrap" style="font-size: 0.8rem;">
                        <div class="d-flex align-items-center gap-1.5">
                            <div class="author-circle-sm" style="background-color: {{ $bgColor }};">
                                {{ $initial }}
                            </div>
                            <span class="fw-semibold text-dark">
                                {{ ($item->penulis->nama_depan ?? '') . ' ' . ($item->penulis->nama_belakang ?? '') }}
                            </span>
                        </div>
                        <span class="text-muted opacity-50">&bull;</span>
                        <div class="d-flex align-items-center gap-1">
                            <i class="fa-regular fa-calendar-days opacity-75"></i>
                            <span>{{ $item->tanggal_only }}</span>
                        </div>
                    </div>
                    
                    <h2 class="h4 mb-3" style="font-weight: 700; line-height: 1.4; letter-spacing: -0.02em;">
                        <a href="{{ route('pengunjung.show', $item->id) }}" class="card-title-link">
                            {{ $item->judul }}
                        </a>
                    </h2>
                    
                    <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        {{ Str::limit(strip_tags($item->isi), 180, '...') }}
                    </p>
                    
                    <div class="mt-auto pt-3 border-top" style="border-color: rgba(241, 245, 249, 0.8) !important;">
                        <a href="{{ route('pengunjung.show', $item->id) }}" class="read-more-link">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right-long transition-arrow" style="font-size: 0.85rem;"></i>
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="card card-premium text-center p-5">
                <div class="text-muted mb-3">
                    <i class="fa-solid fa-newspaper fa-4x opacity-25"></i>
                </div>
                <h3 class="fw-bold">Belum Ada Artikel</h3>
                <p class="text-muted">Tidak ditemukan artikel untuk kategori atau penyaringan yang dipilih.</p>
                <div class="mt-2">
                    <a href="{{ route('pengunjung.index') }}" class="btn-emerald-pill">Kembali ke Beranda</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $artikel->links() }}
    </div>
@endsection

@section('sidebar')
    <!-- Kategori Widget -->
    <div class="widget-premium">
        <h3 class="widget-title-custom">Kategori Artikel</h3>
        <div class="category-pill-container">
            <!-- Link Semua Kategori -->
            <a href="{{ route('pengunjung.index') }}" class="category-pill-custom {{ empty($selectedKategoriIds) ? 'active-pill' : '' }}">
                <span>Semua Artikel</span>
                <span class="category-pill-count">
                    {{ $kategori->sum('artikel_count') }}
                </span>
            </a>
            
            <!-- Loop Daftar Kategori -->
            @foreach($kategori as $kat)
                @php
                    $isChecked = in_array($kat->id, $selectedKategoriIds);
                @endphp
                <label class="category-pill-custom {{ $isChecked ? 'active-pill' : '' }}">
                    <input type="checkbox" name="kategori[]" value="{{ $kat->id }}" class="category-checkbox-hidden" {{ $isChecked ? 'checked' : '' }}>
                    <span style="text-transform: capitalize;">{{ $kat->nama_kategori }}</span>
                    <span class="category-pill-count">
                        {{ $kat->artikel_count }}
                    </span>
                </label>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.category-checkbox-hidden');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const selectedIds = [];
                    document.querySelectorAll('.category-checkbox-hidden:checked').forEach(function(checkedBox) {
                        selectedIds.push(checkedBox.value);
                    });
                    
                    let url = new URL(window.location.href);
                    if (selectedIds.length > 0) {
                        url.searchParams.set('kategori', selectedIds.join(','));
                    } else {
                        url.searchParams.delete('kategori');
                    }
                    window.location.href = url.pathname + url.search;
                });
            });
        });
    </script>
@endsection
