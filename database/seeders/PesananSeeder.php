<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pesanan')->insert([

            [
                'id_user' => 3,
                'tanggal_pesanan' => now(),
                'total_harga' => 55000,
                'status_pesanan' => 'diproses',
                'alamat_kirim' => 'Jl. Mawar No. 20',
                'metode_pembayaran' => 'COD',
                'catatan' => 'Tolong dibungkus rapi',
                'bukti_pembayaran' => null,
                'nama_penerima' => 'Pembeli Satu',
                'no_hp' => '081200000003',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}