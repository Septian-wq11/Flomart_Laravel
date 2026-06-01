<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class SummaryPendapatanSheet implements FromArray, WithTitle, WithStyles
{
    public function array(): array
    {
        $totalPendapatan =
            Pesanan::where(
                'status_pesanan',
                'selesai'
            )->sum('total_harga');

        $jumlahTransaksi =
            Pesanan::where(
                'status_pesanan',
                'selesai'
            )->count();

        $rataRata =
            $jumlahTransaksi > 0
            ? $totalPendapatan / $jumlahTransaksi
            : 0;

        Carbon::setLocale('id');
        return [

            ['LAPORAN PENDAPATAN FLOMART'],

            ['Tanggal Cetak', now()->translatedFormat('d F Y H:i:s')],

            [],

            ['RINGKASAN PENDAPATAN'],

            [
                'Total Pendapatan',
                'Rp '.number_format(
                    $totalPendapatan,
                    0,
                    ',',
                    '.'
                )
            ],

            [
                'Jumlah Transaksi',
                $jumlahTransaksi
            ],

            [
                'Rata-rata Transaksi',
                'Rp '.number_format(
                    $rataRata,
                    0,
                    ',',
                    '.'
                )
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
        return 'Ringkasan Pendapatan';
    }
}