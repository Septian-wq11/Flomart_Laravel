<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin FLOMART',
                'email' => 'admin@flomart.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'alamat' => 'Kantor FLOMART',
                'no_hp' => '081200000001',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Owner FLOMART',
                'email' => 'owner@flomart.com',
                'password' => Hash::make('owner123'),
                'role' => 'owner',
                'alamat' => 'Kantor FLOMART',
                'no_hp' => '081200000002',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Pembeli Satu',
                'email' => 'pembeli@flomart.com',
                'password' => Hash::make('pembeli123'),
                'role' => 'pembeli',
                'alamat' => 'Jl. Mawar No. 10',
                'no_hp' => '081200000003',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}