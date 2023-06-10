<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '1'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '2'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '3'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '4'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '5'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '6'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '7'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '8'
        ]);
        DB::table('organisation_user')->insert([
            'organisation_id' => '1',
            'user_id' => '9'
        ]);
    }
}
