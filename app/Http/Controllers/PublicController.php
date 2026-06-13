<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $articles = Artikel::with(['penulis', 'kategori'])
                            ->latest('id')
                            ->take(5)
                            ->get();
        
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        
        return view('public.home', compact('articles', 'categories'));
    }

    public function semuaArtikel()
    {
        $articles = Artikel::with(['penulis', 'kategori'])
                            ->latest('id')
                            ->paginate(10);
        
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        
        return view('public.home', compact('articles', 'categories'));
    }

    public function category($id)
    {
        $categorySelected = KategoriArtikel::findOrFail($id);
        
        $articles = Artikel::with(['penulis', 'kategori'])
                            ->where('id_kategori', $id)
                            ->latest('id')
                            ->paginate(10);
                            
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        
        return view('public.home', compact('articles', 'categories', 'categorySelected'));
    }

    public function show($id)
    {
        $article = Artikel::with(['penulis', 'kategori'])->findOrFail($id);
        
        $relatedArticles = Artikel::where('id_kategori', $article->id_kategori)
                                  ->where('id', '!=', $id)
                                  ->latest('id')
                                  ->take(5)
                                  ->get();
                                  
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('public.detail', compact('article', 'relatedArticles', 'categories'));
    }

    public function tentang()
    {
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
        
        return view('public.tentang', compact('categories'));
    }
}