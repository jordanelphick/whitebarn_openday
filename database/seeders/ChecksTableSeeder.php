<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checks')->insert([
            'number' => '1',
            'name' => 'Key design assumptions and standards applied in the design are appropriate',
            'phase' => 'initial',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '2',
            'name' => 'Complies with relevant design requirements /Client specifications',
            'phase' => 'initial',
            'status' => 'open',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '1',
            'name' => 'Requests For Information affecting design are resolved',
            'phase' => 'final',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '2',
            'name' => 'Project Change Requests affecting design are resolved',
            'phase' => 'final',
            'status' => 'open',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '3',
            'name' => 'Relevant Client comments are closed out',
            'phase' => 'final',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '4',
            'name' => 'Relevant Safety In Design requirements/actions are Closed Out',
            'phase' => 'final',
            'status' => 'open',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '5',
            'name' => 'Relevant Sustainability requirements/actions are Closed Out',
            'phase' => 'final',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);

        DB::table('checks')->insert([
            'number' => '6',
            'name' => 'Actions on Review Record sheet are closed out',
            'phase' => 'final',
            'status' => 'open',
            'comment' => '',
            'workpackage_id' => 7,
            'updated_at' => '2023-05-18 06:09:45'
        ]);
    }
}
