<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id'=>'1',
            'name' => 'Jordan Elphick',
            'email' => 'jelphick@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'1',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);
    }
}
