<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'electrical',
            'colour_hex' => '#2563eb', // TailwindCss: Blue-600
        ]);
        DB::table('categories')->insert([
            'name' => 'civil',
            'colour_hex' => '#f59e0b', // TailwindCss: Amber-500
        ]);
        DB::table('categories')->insert([
            'name' => 'general',
            'colour_hex' => '#d4d4d4', // TailwindCss: Neutral-300
        ]);
        DB::table('categories')->insert([
            'name' => 'project management',
            'colour_hex' => '#ef4444', // TailwindCss: Red-500
        ]);

    }
}
