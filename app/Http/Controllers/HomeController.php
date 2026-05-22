<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // kategori
        $kategori = Kategori::orderBy('nama_kategori')->get();

        // rekomendasi produk
        $rekomendasi = Produk::latest('id_produk')
            ->take(4)
            ->get();

        // semua produk
        $produk = Produk::with('kategori')
            ->where('stok', '>', 0)
            ->latest('id_produk')
            ->get();

        return view('user.index', compact(
            'kategori',
            'rekomendasi',
            'produk'
        ));
    }
}