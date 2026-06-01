<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class SummaryPesananSheet implements FromArray, WithTitle, WithStyles
{
    public function array(): array
    {
        Carbon::setLocale('id');
        return [

            ['LAPORAN PESANAN FLOMART'],

            ['Tanggal Cetak', now()->translatedFormat('d F Y H:i:s')],

            [],

            ['RINGKASAN PESANAN'],

            ['Total Pesanan',
                Pesanan::count()
            ],

            ['Pending',
                Pesanan::where(
                    'status_pesanan',
                    'pending'
                )->count()
            ],

            ['Menunggu',
                Pesanan::where(
                    'status_pesanan',
                    'menunggu'
                )->count()
            ],

            ['Diproses',
                Pesanan::where(
                    'status_pesanan',
                    'diproses'
                )->count()
            ],

            ['Selesai',
                Pesanan::where(
                    'status_pesanan',
                    'selesai'
                )->count()
            ],

            ['Dibatalkan',
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

        $sheet->getStyle('A4:B10')
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
        return 'Ringkasan';
    }
}