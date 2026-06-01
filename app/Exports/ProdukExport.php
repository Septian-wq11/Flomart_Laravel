<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProdukExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [

            new SummaryProdukSheet(),

            new ProdukSheet()

        ];
    }
}