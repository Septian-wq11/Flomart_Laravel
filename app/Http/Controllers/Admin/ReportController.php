<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use App\Models\DetailPesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use App\Exports\PesananExport;
use App\Exports\ProdukExport;
use App\Exports\PendapatanExport;

class ReportController extends Controller
{
    public function index()
{
    $totalProduk = Produk::count();

    $totalPesanan = Pesanan::count();

    $totalPendapatan = Pesanan::where(
        'status_pesanan',
        'selesai'
    )->sum('total_harga');

    return view(
        'admin.report.index',
        compact(
            'totalProduk',
            'totalPesanan',
            'totalPendapatan'
        )
    );
}

public function excelAll()
{
    return Excel::download(
        new LaporanExport,
        'laporan-flomart.xlsx'
    );
}

public function excelPesanan()
{
    return Excel::download(
        new PesananExport,
        'laporan-pesanan.xlsx'
    );
}

public function excelProduk()
{
    return Excel::download(
        new ProdukExport,
        'laporan-produk.xlsx'
    );
}

public function excelPendapatan()
{
    return Excel::download(
        new PendapatanExport,
        'laporan-pendapatan.xlsx'
    );
}

    // ======================
    // PDF KESELURUHAN
    // ======================

    public function pdfAll()
{
    $totalProduk = Produk::count();

    $totalPesanan = Pesanan::count();

    $totalUser = User::count();

    $totalPendapatan =
        Pesanan::where(
            'status_pesanan',
            'selesai'
        )->sum('total_harga');

    // Statistik status pesanan
    $pesananSelesai =
        Pesanan::where(
            'status_pesanan',
            'selesai'
        )->count();

    $pesananDiproses =
        Pesanan::where(
            'status_pesanan',
            'diproses'
        )->count();

    $pesananMenunggu =
        Pesanan::where(
            'status_pesanan',
            'menunggu'
        )->count();

    $pesananPending =
        Pesanan::where(
            'status_pesanan',
            'pending'
        )->count();

    $pesananDibatalkan =
        Pesanan::where(
            'status_pesanan',
            'dibatalkan'
        )->count();

    // Produk terlaris
    $produkTerlaris =
        DetailPesanan::join(
            'produk',
            'detail_pesanan.id_produk',
            '=',
            'produk.id_produk'
        )
        ->select(
            'produk.nama_produk',
            DB::raw(
                'SUM(detail_pesanan.qty) as total_terjual'
            )
        )
        ->groupBy(
            'produk.nama_produk'
        )
        ->orderByDesc(
            'total_terjual'
        )
        ->limit(5)
        ->get();

    // Pesanan terbaru
    $pesananTerbaru =
        Pesanan::latest()
        ->limit(10)
        ->get();

    // Semua produk
    $produk = Produk::all();

    $pdf = Pdf::loadView(
        'admin.report.pdf-all',
        compact(
            'totalProduk',
            'totalPesanan',
            'totalUser',
            'totalPendapatan',
            'pesananSelesai',
            'pesananDiproses',
            'pesananMenunggu',
            'pesananPending',
            'pesananDibatalkan',
            'produkTerlaris',
            'pesananTerbaru',
            'produk'
        )
    );

    return $pdf->download(
        'laporan-flomart.pdf'
    );
}
    // ======================
    // PESANAN
    // ======================

    public function pdfPesanan()
{
    $pesanan = Pesanan::all();

    $totalPesanan = Pesanan::count();

    $pending = Pesanan::where(
        'status_pesanan',
        'pending'
    )->count();

    $menunggu = Pesanan::where(
        'status_pesanan',
        'menunggu'
    )->count();

    $diproses = Pesanan::where(
        'status_pesanan',
        'diproses'
    )->count();

    $selesai = Pesanan::where(
        'status_pesanan',
        'selesai'
    )->count();

    $dibatalkan = Pesanan::where(
        'status_pesanan',
        'dibatalkan'
    )->count();

    $pdf = Pdf::loadView(
        'admin.report.pdf-pesanan',
        compact(
            'pesanan',
            'totalPesanan',
            'pending',
            'menunggu',
            'diproses',
            'selesai',
            'dibatalkan'
        )
    );

    return $pdf->download(
        'laporan-pesanan.pdf'
    );
}

    // ======================
    // PRODUK
    // ======================

    public function pdfProduk()
{
    $produk = Produk::all();

    $totalProduk =
        Produk::count();

    $totalStok =
        Produk::sum('stok');

    $produkHabis =
        Produk::where(
            'stok',
            0
        )->count();

    $pdf = Pdf::loadView(
        'admin.report.pdf-produk',
        compact(
            'produk',
            'totalProduk',
            'totalStok',
            'produkHabis'
        )
    );

    return $pdf->download(
        'laporan-produk.pdf'
    );
}

    // ======================
    // PENDAPATAN
    // ======================

    public function pdfPendapatan()
{
    $totalPendapatan = Pesanan::where(
        'status_pesanan',
        'selesai'
    )->sum('total_harga');

    $totalPesananSelesai = Pesanan::where(
        'status_pesanan',
        'selesai'
    )->count();

    $rataPendapatan =
        $totalPesananSelesai > 0
        ? $totalPendapatan / $totalPesananSelesai
        : 0;

    $pendapatanHariIni =
        Pesanan::where('status_pesanan','selesai')
        ->whereDate(
            'tanggal_pesanan',
            now()->toDateString()
        )
        ->sum('total_harga');

    $pendapatanBulanIni =
        Pesanan::where('status_pesanan','selesai')
        ->whereMonth(
            'tanggal_pesanan',
            now()->month
        )
        ->whereYear(
            'tanggal_pesanan',
            now()->year
        )
        ->sum('total_harga');

    $riwayatPendapatan =
        Pesanan::where(
            'status_pesanan',
            'selesai'
        )
        ->latest()
        ->get();

    $pdf = Pdf::loadView(
        'admin.report.pdf-pendapatan',
        compact(
            'totalPendapatan',
            'totalPesananSelesai',
            'rataPendapatan',
            'pendapatanHariIni',
            'pendapatanBulanIni',
            'riwayatPendapatan'
        )
    );

    return $pdf->download(
        'laporan-pendapatan.pdf'
    );
}
}