<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privilege_user')->insert([
            'privilege_id' => '1',
            'user_id' => '1'
        ]);

        DB::table('privilege_user')->insert([
            'privilege_id' => '2',
            'user_id' => '1'
        ]);
    }
}
