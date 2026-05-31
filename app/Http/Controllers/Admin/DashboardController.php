<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        // statistik
        $totalProduk = Produk::count();

        $totalPesanan = Pesanan::count();

        $pesananBaru = Pesanan::where(
            'status_pesanan',
            'menunggu'
        )->count();

        // daftar produk
        $produk = Produk::with('kategori')
            ->latest('id_produk')
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalProduk',
                'totalPesanan',
                'pesananBaru',
                'produk'
            )
        );
    }
}