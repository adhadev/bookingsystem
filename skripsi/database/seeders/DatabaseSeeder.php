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
            ['nama' => 'oli', 'kode' => '01', 'harga' => 30000, 'waktu' => '00:05:00'],
            ['nama' => 'filter udara', 'kode' => '01', 'harga' => 25000, 'waktu' => '00:10:00'],
            ['nama' => 'busi', 'kode' => '01', 'harga' => 35000, 'waktu' => '00:15:00'],
            ['nama' => 'aki', 'kode' => '01', 'harga' => 90000, 'waktu' => '00:15:00'],
            ['nama' => 'kampas rem', 'kode' => '01', 'harga' => 120000, 'waktu' => '00:15:00'],
            ['nama' => 'ban', 'kode' => '01', 'harga' => 75000, 'waktu' => '00:15:00'],
            ['nama' => 'kampas kopling', 'kode' => '01', 'harga' => 65000, 'waktu' => '00:15:00'],
            ['nama' => 'kompresor AC', 'kode' => '01', 'harga' => 55000, 'waktu' => '00:15:00'],
            ['nama' => 'kondensor', 'kode' => '01', 'harga' => 45000, 'waktu' => '00:15:00'],
            ['nama' => 'sockbreake', 'kode' => '01', 'harga' => 85000, 'waktu' => '00:15:00'],
            ['nama' => 'service ringan', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'service berat', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
        ];
        

        DB::table('db_layanan')->insert($layanan);
    }
}
