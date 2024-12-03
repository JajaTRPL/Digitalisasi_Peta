<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipe_tanah')->insert([
            ['id' => 'TG-000001', 'nama_tipe_tanah' => 'Tanah Bengkok'],
            ['id' => 'TG-000002', 'nama_tipe_tanah' => 'Tanah Kas Desa'],
            ['id' => 'TG-000003', 'nama_tipe_tanah' => 'Tanah Wakaf'],
        ]);
    }
}
