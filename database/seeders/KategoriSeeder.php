<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([

            [
                'nama_kategori' => 'Pupuk Organik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Benih Buah',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Benih Bunga',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Benih Herbal',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Benih Pangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}