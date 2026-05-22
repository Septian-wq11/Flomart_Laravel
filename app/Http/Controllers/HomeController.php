<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $kategoriAktif = $request->kategori;

        // kategori
        $kategori = Kategori::orderBy('nama_kategori')->get();

        // rekomendasi
        $rekomendasi = Produk::with('kategori')
            ->orderByDesc('id_produk')
            ->limit(4)
            ->get();

        // produk
        $produk = Produk::with('kategori')
            ->when($kategoriAktif, function ($query) use ($kategoriAktif) {
                $query->where('id_kategori', $kategoriAktif);
            })
            ->where('stok', '>', 0)
            ->latest('id_produk')
            ->get();

        return view('user.index', compact(
            'kategori',
            'rekomendasi',
            'produk',
            'kategoriAktif'
        ));
    }
}