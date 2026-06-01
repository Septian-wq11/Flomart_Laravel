<?php

namespace App\Exports;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new SummarySheet(),
            new PesananSheet(),
            new ProdukSheet(),
            new PendapatanSheet(),
        ];
    }
}