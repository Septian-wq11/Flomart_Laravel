<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class SummaryProdukSheet implements FromArray, WithTitle, WithStyles
{
    public function array(): array
    {
        Carbon::setLocale('id');
        return [

            ['LAPORAN PRODUK FLOMART'],

            ['Tanggal Cetak', now()->translatedFormat('d F Y H:i:s')],

            [],

            ['RINGKASAN PRODUK'],

            ['Total Produk', Produk::count()],

            ['Total Stok', Produk::sum('stok')],

            [
                'Produk Habis',
                Produk::where('stok', 0)->count()
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

        $sheet->getStyle('A4:B7')
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' =>
                        Border::BORDER_THIN
                    ]
                ]
            ]);

        return [];
    }

    public function title(): string
    {
        return 'Ringkasan Produk';
    }
}