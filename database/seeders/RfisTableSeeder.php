<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RfisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rfis')->insert([
            'number' => 'RPWF-ZEN-RFI-0001',
            'name' => 'Please provide tech spec for WTG transformer',
            'status' => 'open',
            'comment' => 'please provide all relevant documentation for review and consideration win teh BOP design',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);
    }
}
