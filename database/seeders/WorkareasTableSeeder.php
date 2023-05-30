<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Workarea;
use App\Models\Workpackage;

class WorkareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 1; $i<=4; $i++) {
            DB::table('workareas')->insert([
                'number' => '3',
                'name' => 'Project General',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '4',
                'name' => 'System Analysis',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '5',
                'name' => 'External Infrastructure',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '6',
                'name' => 'Temporary Facilities',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '7',
                'name' => 'Permanent Facilities',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '8',
                'name' => 'Transmission Line',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '9',
                'name' => 'Collector Civil and Structural',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '10',
                'name' => 'Collector Electrical',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '11',
                'number_suffix' => 'N',
                'name' => 'North Substation Civil and Structural',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '11',
                'number_suffix' => 'S',
                'name' => 'South Substation Civil and Structural',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '12',
                'number_suffix' => 'N',
                'name' => 'North Substation Primary',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '12',
                'number_suffix' => 'S',
                'name' => 'South Substation Primary',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '13',
                'number_suffix' => 'N',
                'name' => 'North Substation Secondary',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '13',
                'number_suffix' => 'S',
                'name' => 'South Substation Secondary',
                'project_id' => $i
            ]);

            DB::table('workareas')->insert([
                'number' => '14',
                'name' => 'Handover',
                'project_id' => $i
            ]);
        }
    }

}
