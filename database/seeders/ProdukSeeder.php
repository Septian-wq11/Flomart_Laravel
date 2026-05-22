<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([

            [
                'id_kategori' => 1,
                'nama_produk' => 'Benih Kubis',
                'harga' => 10000,
                'stok' => 50,
                'deskripsi' => 'Benih kubis berkualitas',
                'gambar' => 'kubis.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_kategori' => 2,
                'nama_produk' => 'Benih Kelengkeng',
                'harga' => 18000,
                'stok' => 17,
                'deskripsi' => 'Benih kelengkeng unggul',
                'gambar' => 'kelengkeng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_kategori' => 3,
                'nama_produk' => 'Benih Mawar',
                'harga' => 15000,
                'stok' => 25,
                'deskripsi' => 'Benih mawar cantik',
                'gambar' => 'mawar.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}