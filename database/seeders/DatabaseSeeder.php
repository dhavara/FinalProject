<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => 'password'
        ]);

        DB::table('jumlah_zakat')->insert([
            'jumlah_beras' => 0,
            'jumlah_uang' => 0,
            'total_beras' => 0,
            'total_uang' => 0,
            'total_distribusi' => 0,
        ]);

        DB::table('kategori_mustahik')->insert([
            'nama_kategori' => 'Ghorim',
            'jumlah_hak' => 4,
        ]);

        DB::table('kategori_mustahik')->insert([
            'nama_kategori' => 'Fakir',
            'jumlah_hak' => 1,
        ]);

        DB::table('kategori_mustahik')->insert([
            'nama_kategori' => 'Miskin',
            'jumlah_hak' => 2,
        ]);

        DB::table('kategori_mustahik')->insert([
            'nama_kategori' => 'Mualaf',
            'jumlah_hak' => 1,
        ]);

    }
}
