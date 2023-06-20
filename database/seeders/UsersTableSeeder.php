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
            'email' => 'jelphick@hotmail.com.au',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'1',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);


        $user = User::create([
            'id'=>'2',
            'name' => 'Chad Davis',
            'email' => 'cdavis@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'2',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);

        $user = User::create([
            'id'=>'3',
            'name' => 'Joel Hillier',
            'email' => 'jhillier@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'3',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);


        $user = User::create([
            'id'=>'4',
            'name' => 'Michael Wasson',
            'email' => 'mwasson@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'4',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);

        $user = User::create([
            'id'=>'5',
            'name' => 'Mehrdad Paresei',
            'email' => 'mparesei@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'5',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);

        $user = User::create([
            'id'=>'6',
            'name' => 'Tom Bailey',
            'email' => 'tbailey@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'6',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);


        $user = User::create([
            'id'=>'7',
            'name' => 'Jess Haugh',
            'initials_override' => 'JHa',
            'email' => 'jhaugh@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'7',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);

        $user = User::create([
            'id'=>'8',
            'name' => 'Leah Dove',
            'email' => 'ldove@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'8',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);

        $user = User::create([
            'id'=>'9',
            'name' => 'Riley Thompson',
            'email' => 'rthompson@zenviron.com',
            'password' => Hash::make('NouveauC0de')
        ]);

        $team = Team::create([
            'id'=>'9',
            'name' => $user->name.'\'s Team',
            'user_id' => $user->id,
            'personal_team' => true
        ]);

        $user->ownedTeams()->save($team);
    }
}
