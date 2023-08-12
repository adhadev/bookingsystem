<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $layanan = [
            ['nama' => 'oli', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'filter udara', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'busi', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'aki', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'kampas rem', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'ban', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'kampas kopling', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'kompresor AC', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'kondensor', 'kode' => '01', 'harga' => 5000],
            ['nama' => 'sockbreake', 'kode' => '01', 'harga' => 5000],
        ];

        DB::table('db_layanan')->insert($layanan);
    }
}
