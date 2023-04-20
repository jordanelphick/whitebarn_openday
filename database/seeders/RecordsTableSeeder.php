<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('records')->insert([
            'document_number' => 'ZX115-DWG-0401',
            'document_name' => 'O&M Facility - Overall GA',
            'document_revision' => 'A',
            'status' => 'open',
            'date_reviewed' => '2023-04-19',
            'comment' => 'Confirm orientation of North Arrow',
            'workarea_id' => 7,
            'updated_at' => '2023-04-18 06:09:45'
        ]);

        DB::table('records')->insert([
            'document_number' => 'ZX115-DWG-0401',
            'document_name' => 'O&M Facility - Overall GA',
            'document_revision' => 'A',
            'status' => 'open',
            'date_reviewed' => '2023-04-19',
            'comment' => 'Check with client single 4m wide roller door meets requirements',
            'workarea_id' => 7,
            'updated_at' => '2023-04-19 06:09:45'
        ]);

        DB::table('records')->insert([
            'document_number' => 'ZX115-DWG-0401',
            'document_name' => 'O&M Facility - Overall GA',
            'document_revision' => 'A',
            'status' => 'open',
            'date_reviewed' => '2023-04-19',
            'comment' => 'Check 66000L water tank meets requirements',
            'workarea_id' => 7,
            'updated_at' => '2023-04-20 06:09:45'
        ]);
    }
}
