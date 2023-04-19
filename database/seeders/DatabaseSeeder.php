<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\ProjectsTableSeeder;
use Database\Seeders\WorkPackagesTableSeeder;
use Database\Seeders\RecordsTableSeeder;
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
            WorkPackagesTableSeeder::class,
            RecordsTableSeeder::class
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
