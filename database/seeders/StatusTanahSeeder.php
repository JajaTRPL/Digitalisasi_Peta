<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statusTanah')->insert([
            ['id' => 'ST-00001', 'nama_status_tanah' => 'Disewakan'],
            ['id' => 'ST-00002', 'nama_status_tanah' => 'Tersewa']
        ]);
    }
}
