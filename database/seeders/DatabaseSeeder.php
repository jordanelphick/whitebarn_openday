<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\ProjectsTableSeeder;
use Database\Seeders\WorkareasTableSeeder;
use Database\Seeders\RecordsTableSeeder;
use Database\Seeders\WorkpackagesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            ProjectsTableSeeder::class,
            WorkareasTableSeeder::class,
            RecordsTableSeeder::class,
            WorkpackagesTableSeeder::class
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
