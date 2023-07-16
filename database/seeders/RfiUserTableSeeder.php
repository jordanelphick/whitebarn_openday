<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RfiUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('rfi_user')->insert([
            'rfi_id' => '1',
            'user_id' => '2',
            'create' => '0',
            'read' => '0',
            'update' => '0',
            'delete' => '0'
        ]);

        DB::table('rfi_user')->insert([
            'rfi_id' => '1',
            'user_id' => '1',
            'create' => '1',
            'read' => '1',
            'update' => '1',
            'delete' => '1'
        ]);

        DB::table('rfi_user')->insert([
            'rfi_id' => '1',
            'user_id' => '3',
            'create' => '0',
            'read' => '1',
            'update' => '1',
            'delete' => '0'
        ]);

        DB::table('rfi_user')->insert([
            'rfi_id' => '1',
            'user_id' => '4',
            'create' => '1',
            'read' => '1',
            'update' => '0',
            'delete' => '0'
        ]);
    }
}
