@extends('layouts.public')

@section('title', $article->judul . ' - Blog Kami')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <img src="{{ asset('storage/gambar/' . $article->gambar) }}" 
                     alt="{{ $article->judul }}" 
                     class="detail-image">
                
                <a href="{{ route('public.kategori', $article->kategori->id) }}" class="category-badge mb-3">
                    {{ $article->kategori->nama_kategori }}
                </a>
                
                <h1 class="detail-title">{{ $article->judul }}</h1>
                
                <div class="article-meta mb-4" style="font-size: 1rem;">
                    <span>
                        <i class="bi bi-person"></i>
                        {{ $article->penulis->nama_depan }} {{ $article->penulis->nama_belakang }}
                    </span>
                    <span>
                        <i class="bi bi-calendar"></i>
                        {{ $article->hari_tanggal }}
                    </span>
                </div>
                
                <div class="detail-content">
                    {!! nl2br(e($article->isi)) !!}
                </div>
            </article>
            
            <div class="mt-5">
                <a href="{{ route('public.home') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="widget">
                <h4 class="widget-title">Kategori Artikel</h4>
                <ul class="category-list">
                    <li>
                        <a href="{{ route('public.home') }}" class="active">Semua Kategori</a>
                    </li>
                    @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('public.kategori', $cat->id) }}">
                            {{ $cat->nama_kategori }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @if($relatedArticles->count() > 0)
            <div class="widget">
                <h4 class="widget-title">Artikel Terkait</h4>
                @foreach($relatedArticles as $related)
                <div class="related-article">
                    <h6>
                        <a href="{{ route('public.artikel', $related->id) }}">
                            {{ $related->judul }}
                        </a>
                    </h6>
                    <small>
                        <i class="bi bi-calendar"></i> {{ $related->hari_tanggal }}
                    </small>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection