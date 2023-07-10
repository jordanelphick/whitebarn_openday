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
        for ($i = 1; $i < 2; $i++) {
            DB::table('rfis')->insert([
                'sender_index' => $i,
                'project_acronym' => 'MW2WF',
                'number' => 'MW2WF-ZEN-RFI-'.str_pad($i, 4, '0', STR_PAD_LEFT),
                'name' => 'WTG transformer specification',
                'status' => 'open',
                'comment' => 'please provide all relevant documentation for review and consideration win the BOP design',
                'category_id' => '1',
                'workpackage_id' => 7,
                'user_id' => 1,
                'sender_organisation_id' => '1',
                'receiver_organisation_id' => '2',
                'next_update_organisation_id' => '2',
                'created_at' => '2023-05-13 06:09:45',
                'updated_at' => '2023-05-18 06:09:45'
            ]);
        }
    }
}
