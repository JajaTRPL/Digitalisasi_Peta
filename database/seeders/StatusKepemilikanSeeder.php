<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusKepemilikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_kepemilikan')->insert([
            ['id' => 'SK-00001', 'nama_status_kepemilikan' => 'Milik Pemerintah'],
            ['id' => 'SK-00002', 'nama_status_kepemilikan' => 'Milik Perorangan'],
            ['id' => 'SK-00003', 'nama_status_kepemilikan' => 'Milik Kelurahan'],
        ]);
    }
}
