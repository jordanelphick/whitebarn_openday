<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\WorkpackagesTableSeeder;
use Illuminate\Database\Seeder;



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
            WorkpackagesTableSeeder::class,
            RecordsTableSeeder::class,
            ChecksTableSeeder::class,
            PrivilegesTableSeeder::class,
            PrivilegeUserTableSeeder::class,
            OrganisationsTableSeeder::class,
            OrganisationUserTableSeeder::class,
            RfisTableSeeder::class,
            MessagesTableSeeder::class,
            AttachmentsTableSeeder::class,

        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
