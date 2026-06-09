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
    ->withSum('detailPesanan', 'qty')
    ->orderByDesc('detail_pesanan_sum_qty')
    ->limit(4)
    ->get();

        // produk
        $produk = Produk::with('kategori')
    ->leftJoin('detail_pesanan', 'produk.id_produk', '=', 'detail_pesanan.id_produk')
    ->select(
        'produk.*',
        DB::raw('COALESCE(SUM(detail_pesanan.qty),0) as total_terjual')
    )
    ->when($kategoriAktif, function ($query) use ($kategoriAktif) {
        $query->where('produk.id_kategori', $kategoriAktif);
    })
    ->where('produk.stok', '>', 0)
    ->groupBy(
        'produk.id_produk',
        'produk.nama_produk',
        'produk.id_kategori',
        'produk.harga',
        'produk.stok',
        'produk.gambar',
        'produk.deskripsi',
        'produk.created_at',
        'produk.updated_at'
    )
    ->latest('produk.id_produk')
    ->get();

        return view('user.index', compact(
            'kategori',
            'rekomendasi',
            'produk',
            'kategoriAktif'
        ));
    }
}