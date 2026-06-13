<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #8d1212;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #ffffff;
        }
        
        .navbar-brand:hover {
            color: #ffffff;
        }
        
        .nav-link {
            color: #ffffff;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #ffffff;
            background-color: #6c0b0b;
        }
        
        .nav-link.active {
            color: #ffffff;
            background-color: #8d1212; 
        }

        .main-container {
            padding: 2rem 0;
        }

        .article-card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        
        .article-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .article-card-body {
            padding: 1.5rem;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: #e3f2fd;
            color: #1565c0;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            text-decoration: none;
        }
        
        .category-badge:hover {
            background-color: #bbdefb;
            color: #0d47a1;
        }
        
        .article-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }
        
        .article-title a {
            color: inherit;
            text-decoration: none;
        }
        
        .article-title a:hover {
            color: #2c3e50;
        }
        
        .article-excerpt {
            color: #666666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .article-meta {
            display: flex;
            gap: 1.5rem;
            color: #888888;
            font-size: 0.875rem;
        }
        
        .article-meta i {
            margin-right: 0.5rem;
        }

        .widget {
            background: #ffffff;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        
        .widget-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .category-list li {
            margin-bottom: 0.5rem;
        }
        
        .category-list a {
            display: block;
            padding: 0.5rem 0.75rem;
            color: #555555;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .category-list a:hover,
        .category-list a.active {
            background-color: #f0f0f0;
            color: #2c3e50;
            font-weight: 600;
        }

        .detail-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
        
        .detail-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .detail-content {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #333333;
        }
        
        .detail-content p {
            margin-bottom: 1.5rem;
        }

        .related-article {
            margin-bottom: 1.5rem;
        }
        
        .related-article h6 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .related-article h6 a {
            color: #2c3e50;
            text-decoration: none;
        }
        
        .related-article h6 a:hover {
            color: #1565c0;
        }
        
        .related-article small {
            color: #888888;
        }

        footer {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('public.home') }}">
    Blog Kami
    <small style="display: block; font-size: 0.7rem; font-weight: 400; color: #888888; margin-top: 2px;">
        Blog mengispirasi semua kalangan
    </small>
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.home') ? 'active' : '' }}" 
                           href="{{ route('public.home') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.semua-artikel') ? 'active' : '' }}" 
                           href="{{ route('public.semua-artikel') }}">
                            Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.kategori') ? 'active' : '' }}" 
                           href="{{ route('public.kategori', 1) }}">
                            Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.tentang') ? 'active' : '' }}" 
                           href="{{ route('public.tentang') }}">
                            Tentang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Blog Kami. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>