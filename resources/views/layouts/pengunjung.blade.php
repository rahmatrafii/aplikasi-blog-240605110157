<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog Pengunjung') - CMS Blog</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Premium Custom Styles -->
    <style>
        :root {
            --dark-navy: #1e2530;
            --bg-light: #f6f8fa;
            --card-bg: #ffffff;
            --accent-green: #10b981;
            --accent-green-hover: #059669;
            --text-primary: #1e293b;
            --text-muted: #64748b;
            --badge-lavender-bg: #e0e7ff;
            --badge-lavender-text: #4f46e5;
            --card-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            --card-shadow-hover: 0 20px 40px -15px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Scrollbar Kustom */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg-light);
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-green);
        }

        /* Animasi Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-fade-in {
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
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

        /* Kartu Vertikal Premium */
        .card-premium {
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: 20px;
            background-color: var(--card-bg);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.01);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.4s ease;
            overflow: hidden;
        }

        /* Hover khusus untuk daftar kartu yang interaktif */
        .card-premium-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
            border-color: rgba(16, 185, 129, 0.15);
        }

        .card-premium .img-zoom-container {
            overflow: hidden;
            position: relative;
        }

        .card-premium .img-zoom-container img {
            transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .card-premium-hover:hover .img-zoom-container img {
            transform: scale(1.05);
        }

        .card-title-link {
            text-decoration: none;
            color: var(--text-primary);
            transition: color 0.25s ease;
        }

        .card-title-link:hover {
            color: var(--accent-green);
        }

        /* Badge Kategori Melayang Premium */
        .badge-premium-category {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: var(--badge-lavender-text);
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.725rem;
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
        }

        .badge-premium-category:hover {
            background-color: var(--accent-green);
            border-color: var(--accent-green);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.25);
        }

        /* Badge Kategori Standar (dipertahankan untuk kecocokan ke belakang) */
        .badge-lavender {
            background-color: var(--badge-lavender-bg);
            color: var(--badge-lavender-text);
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            display: inline-block;
            text-transform: capitalize;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .badge-lavender:hover {
            background-color: #dee2ff;
            color: #3b30e5;
            transform: translateY(-1px);
        }

        /* Tombol Hijau Pill */
        .btn-emerald-pill {
            background-color: var(--accent-green);
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 50px;
            padding: 9px 24px;
            font-size: 0.85rem;
            border: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-emerald-pill i {
            transition: transform 0.25s ease;
        }

        .btn-emerald-pill:hover {
            background-color: var(--accent-green-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
        }

        .btn-emerald-pill:hover i {
            transform: translateX(4px);
        }

        /* Link Baca Selengkapnya Modern */
        .read-more-link {
            color: var(--accent-green);
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.25s ease;
        }

        .read-more-link:hover {
            color: var(--accent-green-hover);
        }

        .read-more-link .transition-arrow {
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .read-more-link:hover .transition-arrow {
            transform: translateX(5px);
        }

        /* Avatar Lingkaran */
        .author-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            box-shadow: 0 2px 5px rgba(0,0,0,0.06);
            border: 2px solid #ffffff;
        }

        /* Avatar Lingkaran Kecil Modern */
        .author-circle-sm {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.65rem;
            text-transform: uppercase;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1.5px solid #ffffff;
        }

        /* Sidebar Kategori Premium */
        .widget-premium {
            background-color: var(--card-bg);
            border-radius: 16px;
            border: 1px solid rgba(241, 245, 249, 0.8);
            box-shadow: var(--card-shadow);
            padding: 24px;
            margin-bottom: 24px;
            transition: box-shadow 0.3s ease;
        }

        .widget-premium:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .widget-title-custom {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
            letter-spacing: -0.01em;
        }

        .category-item-custom {
            border: none;
            border-radius: 10px !important;
            padding: 12px 16px;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .category-item-custom:hover {
            background-color: #f1f5f9;
            color: var(--text-primary);
            transform: translateX(4px);
        }

        .category-item-custom.active-category {
            background-color: rgba(16, 185, 129, 0.08) !important;
            color: #065f46 !important;
            font-weight: 600;
            border-left: 3px solid var(--accent-green);
        }

        /* Custom Pill Checkboxes (Modern style based on image.png) */
        .category-pill-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .category-pill-custom {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 14px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            user-select: none;
            gap: 6px;
            text-decoration: none;
        }

        .category-pill-custom:hover {
            border-color: var(--accent-green);
            color: var(--accent-green);
            transform: translateY(-1px);
        }

        .category-checkbox-hidden {
            display: none;
        }

        /* Checked state - Solid Green filled button */
        .category-pill-custom.active-pill {
            background-color: var(--accent-green) !important;
            border-color: var(--accent-green) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        }

        /* Count Badge inside pill */
        .category-pill-count {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 6px;
            background-color: #f1f5f9;
            color: var(--text-muted);
            transition: all 0.25s ease;
        }

        .category-pill-custom.active-pill .category-pill-count {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .category-pill-custom:not(.active-pill):hover .category-pill-count {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent-green);
        }

        .badge-count-custom {
            font-weight: 600;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 50px;
            transition: all 0.25s ease;
        }

        .category-item-custom.active-category .badge-count-custom {
            background-color: var(--accent-green) !important;
            color: #ffffff !important;
            box-shadow: 0 2px 6px rgba(16, 185, 129, 0.3);
        }

        .category-item-custom:not(.active-category) .badge-count-custom {
            background-color: #f1f5f9;
            color: var(--text-muted);
        }

        /* Halaman Detail */
        .breadcrumb-custom {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .breadcrumb-custom a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.25s ease;
        }

        .breadcrumb-custom a:hover {
            color: var(--accent-green);
        }

        .breadcrumb-custom i {
            font-size: 0.75rem;
            color: #cbd5e1;
        }

        .breadcrumb-custom .active-crumb {
            color: var(--text-primary);
            font-weight: 600;
        }

        .article-body-custom {
            font-size: 1.125rem;
            line-height: 1.95;
            color: #2c3e50;
            letter-spacing: -0.005em;
        }

        .article-body-custom p {
            margin-bottom: 1.75rem;
        }

        .article-body-custom blockquote {
            border-left: 4px solid var(--accent-green);
            background-color: #f8fafc;
            padding: 1.25rem 1.75rem;
            margin: 2.25rem 0;
            border-radius: 0 16px 16px 0;
            font-style: italic;
            color: #475569;
            box-shadow: inset 2px 0 0 rgba(0,0,0,0.02);
            font-size: 1.2rem;
        }

        .article-body-custom h2, .article-body-custom h3 {
            color: var(--text-primary);
            font-weight: 700;
            margin-top: 2.25rem;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        /* Related Articles Hover Effects */
        .related-article-item {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .related-article-item:hover {
            transform: translateX(4px);
            background-color: rgba(0, 0, 0, 0.01);
        }

        .related-article-item:hover .related-title {
            color: var(--accent-green) !important;
        }

        .related-article-item:hover img {
            transform: scale(1.06);
        }

        /* Footer Kustom */
        .footer-dark {
            background-color: var(--dark-navy);
            color: #94a3b8;
            padding: 35px 0;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-dark p {
            margin-bottom: 0;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
        }

        /* Custom Premium & Compact Pagination */
        .pagination {
            gap: 6px;
        }

        .pagination .page-item .page-link {
            border: none;
            color: var(--text-primary);
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px !important;
            padding: 8px 14px;
            font-size: 0.875rem;
            font-weight: 600;
            min-width: 38px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--accent-green) !important;
            border-color: var(--accent-green) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: var(--accent-green);
            transform: translateY(-1px);
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f8fafc;
            border-color: #e2e8f0;
            color: #cbd5e1;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

    @include('layouts.partials.navbar')

    <!-- Main Container -->
    <div class="container my-5 animated-fade-in">
        <div class="row g-4">
            <!-- Content Area -->
            <div class="col-lg-8">
                @yield('content')
            </div>

            <!-- Sidebar Area -->
            <div class="col-lg-4">
                @yield('sidebar')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-dark text-center">
        <div class="container">
            <p>&copy; 2028 Blog Kami. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
