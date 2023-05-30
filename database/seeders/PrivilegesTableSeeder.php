<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privileges')->insert([
            'name' => 'privileges',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'users',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'projects',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'workareas',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'workpackages',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'rfis',
            'delegatable' => '1'
        ]);

        DB::table('privileges')->insert([
            'name' => 'records',
            'delegatable' => '1'
        ]);
    }
}
