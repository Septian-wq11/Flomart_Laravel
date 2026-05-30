<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('keranjang')->insert([

            [
                'id_user' => 3,
                'id_produk' => 1,
                'qty' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}