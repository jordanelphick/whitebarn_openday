<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisations')->insert([
            'name' => 'Zenviron',
            'acronym' => 'ZEN'
        ]);

        DB::table('organisations')->insert([
            'name' => 'Tilt',
            'acronym' => 'TLT'
        ]);

        DB::table('organisations')->insert([
            'name' => 'Equis',
            'acronym' => 'EQU'
        ]);

        DB::table('organisations')->insert([
            'name' => 'Fluence',
            'acronym' => 'FLU'
        ]);

        DB::table('organisations')->insert([
            'name' => 'Transgrid',
            'acronym' => 'TGD'
        ]);

        DB::table('organisations')->insert([
            'name' => 'iCubed',
            'acronym' => 'ICU'
        ]);

        DB::table('organisations')->insert([
            'name' => 'Beca',
            'acronym' => 'BEC'
        ]);

        DB::table('organisations')->insert([
            'name' => 'CIG',
            'acronym' => 'CIG'
        ]);
    }
}
