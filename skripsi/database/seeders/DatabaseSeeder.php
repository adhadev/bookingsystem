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

        $user = [
            ['username' => 'admin', 'nama' => 'admin', 'role' => 'admin','password' => 'admin'],
            ['username' => 'roleman1', 'nama' => 'roleman1', 'role' => 'roleman','password' => 'roleman1'],
            ['username' => 'roleman2', 'nama' => 'roleman2', 'role' => 'roleman','password' => 'roleman2'],
        ];

        $teknisi = [
            ['nama_teknisi' => 'Teknisi A1', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A2', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A3', 'status' => 'On Working', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A4', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A5', 'status' => 'On Working', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi B1', 'status' => 'available', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B2', 'status' => 'On Working', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B3', 'status' => 'On Working', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B4', 'status' => 'On Working', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B5', 'status' => 'available', 'foreman_id' => '3'],
        ];
        

        DB::table('db_layanan')->insert($layanan);
        DB::table('db_users')->insert($user);
        DB::table('db_teknisi')->insert($teknisi);
    }
}
