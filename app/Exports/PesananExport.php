<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PesananExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new SummaryPesananSheet(),
            new PesananSheet(),
        ];
    }
}