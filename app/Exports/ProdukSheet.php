<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class ProdukSheet implements
    FromCollection,
    WithTitle,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    public function collection()
    {
        return Produk::select(
            'id_produk',
            'nama_produk',
            'harga',
            'stok'
        )->get();
    }

public function headings(): array
{
    return [
        'ID Produk',
        'Nama Produk',
        'Harga',
        'Stok'
    ];
}

public function styles(Worksheet $sheet)
{
    $sheet->getStyle('A1:D1')
        ->getFont()
        ->setBold(true)
        ->setSize(12);

    $sheet->getStyle('A1:D1')
        ->applyFromArray([
            'fill' => [
                'fillType' =>
                    \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => [
                    'rgb' => 'FFF2CC'
                ]
            ]
        ]);

    $lastRow = $sheet->getHighestRow();

    $sheet->getStyle("A1:D{$lastRow}")
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
        return 'Produk';
    }
}