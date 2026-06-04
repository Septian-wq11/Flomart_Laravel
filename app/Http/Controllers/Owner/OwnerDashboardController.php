<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Pesanan;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();

        $totalPesanan = Pesanan::count();

        $pesananBaru = Pesanan::where(
            'status_pesanan',
            'menunggu'
        )->count();

        $totalPendapatan = Pesanan::where(
            'status_pesanan',
            'selesai'
        )->sum('total_harga');

        $produk = Produk::with('kategori')
            ->latest('id_produk')
            ->get();

        $penjualanRaw = Pesanan::select(
            DB::raw('MONTH(tanggal_pesanan) as bulan'),
            DB::raw('SUM(total_harga) as total')
        )
        ->where('status_pesanan', 'selesai')
        ->groupBy('bulan')
        ->pluck('total', 'bulan');

        $namaBulan = [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ];

        $dataPendapatan = [];

        for ($i = 1; $i <= 12; $i++) {
            $dataPendapatan[] = $penjualanRaw[$i] ?? 0;
        }

        $statusPesanan = Pesanan::select(
            'status_pesanan',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('status_pesanan')
        ->get();

        $produkTerlaris = DetailPesanan::join(
            'produk',
            'detail_pesanan.id_produk',
            '=',
            'produk.id_produk'
        )
        ->select(
            'produk.nama_produk',
            DB::raw('SUM(detail_pesanan.qty) as total_terjual')
        )
        ->groupBy('produk.nama_produk')
        ->orderByDesc('total_terjual')
        ->limit(5)
        ->get();

        $metodePembayaran = Pesanan::select(
            'metode_pembayaran',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('metode_pembayaran')
        ->get();

        return view(
            'owner.dashboard',
            compact(
                'totalProduk',
                'totalPesanan',
                'pesananBaru',
                'totalPendapatan',
                'produk',
                'statusPesanan',
                'produkTerlaris',
                'metodePembayaran',
                'namaBulan',
                'dataPendapatan'
            )
        );
    }
}