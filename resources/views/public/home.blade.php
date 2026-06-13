@extends('layouts.public')

@section('title', 'Beranda - Blog Kami')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4" style="color: rgb(0, 0, 0); font-weight: 700;">
                @if(isset($categorySelected))
                    Kategori: {{ $categorySelected->nama_kategori }}
                @else
                    Artikel Terbaru
                @endif
            </h2>
            
            @forelse($articles as $article)
            <div class="article-card">
                <img src="{{ asset('storage/gambar/' . $article->gambar) }}" alt="Gambar Artikel">
                <div class="article-card-body">
                    <a href="{{ route('public.kategori', $article->kategori->id) }}" class="category-badge">
                        {{ $article->kategori->nama_kategori }}
                    </a>
                    <h3 class="article-title">
                        <a href="{{ route('public.artikel', $article->id) }}">
                            {{ $article->judul }}
                        </a>
                    </h3>
                    <p class="article-excerpt">
                        {{ Str::limit(strip_tags($article->isi), 150) }}
                    </p>
                    <div class="article-meta">
                        <span>
                            <i class="bi bi-person"></i>
                            {{ $article->penulis->nama_depan }} {{ $article->penulis->nama_belakang }}
                        </span>
                        <span>
                            <i class="bi bi-calendar"></i>
                            {{ $article->hari_tanggal }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Belum ada artikel yang tersedia.
            </div>
            @endforelse
            
            @if($articles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="widget">
                <h4 class="widget-title">Kategori Artikel</h4>
                <ul class="category-list">
                    <li>
                        <a href="{{ route('public.home') }}" 
                           class="{{ !isset($categorySelected) ? 'active' : '' }}">
                            Semua Kategori
                        </a>
                    </li>
                    @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('public.kategori', $cat->id) }}"
                           class="{{ isset($categorySelected) && $categorySelected->id == $cat->id ? 'active' : '' }}">
                            {{ $cat->nama_kategori }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection