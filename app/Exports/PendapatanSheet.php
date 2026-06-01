<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendapatanSheet implements
    FromCollection,
    WithTitle,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithColumnFormatting
{
    public function collection()
    {
        return Pesanan::where(
            'status_pesanan',
            'selesai'
        )
        ->select(
            'id_pesanan',
            'nama_penerima',
            'total_harga',
            'tanggal_pesanan'
        )
        ->get();
    }

    public function headings(): array
{
    return [
        'ID Pesanan',
        'Penerima',
        'Pendapatan',
        'Tanggal'
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
                    'rgb' => 'FCE5CD'
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

public function columnFormats(): array
{
    return [

        'C' =>
        '"Rp" #,##0'

    ];
}

    public function title(): string
    {
        return 'Pendapatan';
    }
}