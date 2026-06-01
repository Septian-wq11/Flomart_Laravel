<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class PesananSheet implements
    FromCollection,
    WithTitle,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    public function collection()
    {
        return Pesanan::select(
            'id_pesanan',
            'nama_penerima',
            'total_harga',
            'status_pesanan',
            'tanggal_pesanan'
        )->get();
    }

    public function headings(): array
{
    return [
        'ID Pesanan',
        'Nama Penerima',
        'Total Harga',
        'Status',
        'Tanggal'
    ];
}

public function styles(Worksheet $sheet)
{
    $sheet->getStyle('A1:E1')
        ->getFont()
        ->setBold(true)
        ->setSize(12);

    // warna header
    $sheet->getStyle('A1:E1')
        ->applyFromArray([
            'fill' => [
                'fillType' =>
                    \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => [
                    'rgb' => 'D9EAD3'
                ]
            ]
        ]);

    // border seluruh tabel
    $lastRow = $sheet->getHighestRow();

    $sheet->getStyle("A1:E{$lastRow}")
        ->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ]);

    return [];
}

    public function title(): string
    {
        return 'Pesanan';
    }
}