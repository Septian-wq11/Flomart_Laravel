<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPesananSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_pesanan')->insert([

            [
                'id_pesanan' => 1,
                'id_produk' => 1,
                'qty' => 5,
                'harga' => 10000,
                'subtotal' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}