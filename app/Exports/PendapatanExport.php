<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PendapatanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [

            new SummaryPendapatanSheet(),

            new PendapatanSheet()

        ];
    }
}