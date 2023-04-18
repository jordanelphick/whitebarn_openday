<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'number' => 'ZX115',
            'name' => 'Rye Park Wind Farm'
        ]);

        DB::table('projects')->insert([
            'number' => 'ZX116',
            'name' => 'Boulder Creek Wind Farm'
        ]);

        DB::table('projects')->insert([
            'number' => 'ZX117',
            'name' => 'Lotus Creek Wind Farm    '
        ]);

        DB::table('projects')->insert([
            'number' => 'ZX118',
            'name' => 'La Trobe BESS'
        ]);
    }
}
