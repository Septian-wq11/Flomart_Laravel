<?php

namespace App\Exports;

use App\Models\Pesanan;
use App\Models\Produk;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SummarySheet implements
    FromArray,
    WithTitle,
    WithStyles,
    ShouldAutoSize
{
    public function array(): array
{
    Carbon::setLocale('id');
    return [

        ['LAPORAN FLOMART'],

        ['Tanggal Cetak', now()->translatedFormat('d F Y H:i:s')],

        [],

        ['RINGKASAN BISNIS'],

        ['Total Produk', Produk::count()],

        ['Total Pesanan', Pesanan::count()],

        [
            'Total Pendapatan',
            Pesanan::where(
                'status_pesanan',
                'selesai'
            )->sum('total_harga')
        ],

        [
    'Rata-rata Nilai Pesanan',
    round(
        Pesanan::where('status_pesanan','selesai')
        ->avg('total_harga')
    )
],

        [
            'Pesanan Menunggu',
            Pesanan::where(
                'status_pesanan',
                'menunggu'
            )->count()
        ],

        [
            'Pesanan Diproses',
            Pesanan::where(
                'status_pesanan',
                'diproses'
            )->count()
        ],

        [
            'Pesanan Selesai',
            Pesanan::where(
                'status_pesanan',
                'selesai'
            )->count()
        ],

        [
            'Pesanan Dibatalkan',
            Pesanan::where(
                'status_pesanan',
                'dibatalkan'
            )->count()
        ],

    ];
}

public function styles(Worksheet $sheet)
{
    $sheet->mergeCells('A1:B1');

    $sheet->getStyle('A1')
        ->getFont()
        ->setBold(true)
        ->setSize(18);

    $sheet->getStyle('A4:B11')
        ->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ]);

    // warna judul laporan
    $sheet->getStyle('A1:B1')
        ->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => [
                    'rgb' => 'D9EAF7'
                ]
            ]
        ]);

    // warna ringkasan bisnis
    $sheet->getStyle('A4:B4')
        ->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => [
                    'rgb' => 'D9EAF7'
                ]
            ]
        ]);

    return [];
}

    public function title(): string
    {
        return 'Dashboard';
    }
}