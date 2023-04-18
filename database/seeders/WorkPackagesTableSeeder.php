<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 1; $i<=4; $i++) {
            DB::table('workpackages')->insert([
                'number' => '3',
                'name' => 'Project General',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '4',
                'name' => 'System Analysis',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '5',
                'name' => 'External Infrastructure',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '6',
                'name' => 'Temporary Facilities',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '7',
                'name' => 'Permanent Facilities',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '8',
                'name' => 'Transmission Line',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '9',
                'name' => 'Collector Civil and Structural',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '10',
                'name' => 'Collector Electrical',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '11',
                'name' => 'Substation Civil and Structural',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '12',
                'name' => 'Substation Primary',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '13',
                'name' => 'Substation Secondary',
                'project_id' => $i
            ]);

            DB::table('workpackages')->insert([
                'number' => '14',
                'name' => 'Handover',
                'project_id' => $i
            ]);
        }
    }
}
