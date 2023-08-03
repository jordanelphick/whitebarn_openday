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
            "name" => "Sue McColl",
            "open_day_ticket_qty" => "2",
            "email" => "admin@whitebarn.com.au",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Skye Englert",
        "open_day_ticket_qty" => "2",
        "email" => "stepaeaenglert@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rachelle sodermans",
        "open_day_ticket_qty" => "2",
        "email" => "Rachelle_sodermans@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Dannielle Gee",
        "open_day_ticket_qty" => "1",
        "email" => "danni.gee967@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Erin Croce",
        "open_day_ticket_qty" => "2",
        "email" => "wog-grl_031@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Olivia Zaouk",
        "open_day_ticket_qty" => "2",
        "email" => "oliviazaouk@yahoo.com.au",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Natalie Hronopoulos",
        "open_day_ticket_qty" => "2",
        "email" => "nattyh215@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lexy Ritchie",
        "open_day_ticket_qty" => "2",
        "email" => "pickering.wedding@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Hannah Wilson",
        "open_day_ticket_qty" => "2",
        "email" => "hannah_wilson56@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Todd verrills",
        "open_day_ticket_qty" => "2",
        "email" => "toddverrills@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lachlan Vane",
        "open_day_ticket_qty" => "2",
        "email" => "lachlanv2000.lv@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lharni Moran",
        "open_day_ticket_qty" => "4",
        "email" => "lharnic@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Haley Paton",
        "open_day_ticket_qty" => "2",
        "email" => "hpaton94@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Kylie Marsh",
        "open_day_ticket_qty" => "2",
        "email" => "misskyliejane@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Tahlia Gageler",
        "open_day_ticket_qty" => "2",
        "email" => "tahlia.gageler@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Matthew Wangmann",
        "open_day_ticket_qty" => "2",
        "email" => "matthewwangmann96@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Georgia Bailey",
        "open_day_ticket_qty" => "4",
        "email" => "georgiajacobplan@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Hollie Jones",
        "open_day_ticket_qty" => "2",
        "email" => "hollie.marie.jones93@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Kiandra Ross",
        "open_day_ticket_qty" => "4",
        "email" => "kiandra1404@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Katrina Lim",
        "open_day_ticket_qty" => "2",
        "email" => "katrina.lim@live.com.au",
            "password" => Hash::make('NouveauC0de'),
        ]);


        $user = User::create([
        "name" => "Joanne Brind",
        "open_day_ticket_qty" => "2",
        "email" => "jobrind71@outlook.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Celeste Ambalong",
        "open_day_ticket_qty" => "2",
        "email" => "celesteambalong@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rebecca Chapman",
        "open_day_ticket_qty" => "2",
        "email" => "rebeccachapman83@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Sophie Gill",
        "open_day_ticket_qty" => "6",
        "email" => "arndellwedding@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Eliesha Kelly",
        "open_day_ticket_qty" => "2",
        "email" => "eliesha.kelly@outlook.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Adam Turner",
        "open_day_ticket_qty" => "1",
        "email" => "adamturner918@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Claire Spain",
        "open_day_ticket_qty" => "2",
        "email" => "claire.spain1998@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Mel Schultz",
        "open_day_ticket_qty" => "2",
        "email" => "mel.smith@live.com.au",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Sam Binkin",
        "open_day_ticket_qty" => "2",
        "email" => "talea.d@live.com.au",
            "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Rebecca Hide",
        "open_day_ticket_qty" => "3",
        "email" => "rebeccahide1@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Maddie Charnock",
        "open_day_ticket_qty" => "2",
        "email" => "maddiecharnock@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Claudia Bourke",
        "open_day_ticket_qty" => "2",
        "email" => "claudia.1196@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Blythe Quick",
        "open_day_ticket_qty" => "2",
        "email" => "blythe.quick@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "tessa Leal",
        "open_day_ticket_qty" => "2",
        "email" => "tessaleal13@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Tanya Blower",
        "open_day_ticket_qty" => "2",
        "email" => "tanyajanelle@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Laura Johnson",
        "open_day_ticket_qty" => "4",
        "email" => "lauraellenjohnson6@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Koner Mills",
        "open_day_ticket_qty" => "6",
        "email" => "koner1005@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Tayla Windred",
        "open_day_ticket_qty" => "1",
        "email" => "windredtayla@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rebecca Raynor",
        "open_day_ticket_qty" => "2",
        "email" => "rebeccaraynor@icloud.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Eliza-jane Mulligan",
        "open_day_ticket_qty" => "1",
        "email" => "elizajanemulligan16@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Bella Romeo",
        "open_day_ticket_qty" => "2",
        "email" => "bella.romeo1@hotmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Shantelle Learmouth",
        "open_day_ticket_qty" => "2",
        "email" => "brindalear@outlook.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Elkie Shorrocks",
        "open_day_ticket_qty" => "2",
        "email" => "eshorrocks@rdd.net.au",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Casey Linabury",
        "open_day_ticket_qty" => "4",
        "email" => "caseylino84@gmail.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Taylah Walton",
        "open_day_ticket_qty" => "2",
        "email" => "taylahwalton@outlook.com",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
            "name" => "Alyssa Hillman",
            "open_day_ticket_qty" => "5",
            "email" => "alyssa.hillman@outlook.com",
            "password" => Hash::make('NouveauC0de'),
        ]);


    }
}
