<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class OwnerReportController extends Controller
{
    public function index()
{
    $totalProduk = Produk::count();

    $totalPesanan = Pesanan::count();

    $totalPendapatan = Pesanan::where(
        'status_pesanan',
        'selesai'
    )->sum('total_harga');

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

    return view(
        'owner.report.index',
        compact(
            'totalProduk',
            'totalPesanan',
            'totalPendapatan',
            'pending',
            'menunggu',
            'diproses',
            'selesai',
            'dibatalkan'
        )
    );
}

    public function pdfAll()
    {
        return app(
            \App\Http\Controllers\Admin\ReportController::class
        )->pdfAll();
    }

    public function excelAll()
    {
        return Excel::download(
            new LaporanExport,
            'laporan-flomart.xlsx'
        );
    }
}