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
            "mobile" => "",
            "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Skye Englert",
        "open_day_ticket_qty" => "2",
        "email" => "stepaeaenglert@gmail.com",
        "mobile" => "0422758337",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rachelle sodermans",
        "open_day_ticket_qty" => "2",
        "email" => "Rachelle_sodermans@hotmail.com",
        "mobile" => "0409499151",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Dannielle Gee",
        "open_day_ticket_qty" => "1",
        "email" => "danni.gee967@gmail.com",
        "mobile" => "0412538696",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Erin Croce",
        "open_day_ticket_qty" => "2",
        "email" => "wog-grl_031@hotmail.com",
        "mobile" => "0478773190",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Olivia Zaouk",
        "open_day_ticket_qty" => "2",
        "email" => "oliviazaouk@yahoo.com.au",
        "mobile" => "0476142162",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Natalie Hronopoulos",
        "open_day_ticket_qty" => "2",
        "email" => "nattyh215@gmail.com",
        "mobile" => "0410540324",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lexy Ritchie",
        "open_day_ticket_qty" => "2",
        "email" => "pickering.wedding@hotmail.com",
        "mobile" => "0431049487",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Hannah Wilson",
        "open_day_ticket_qty" => "2",
        "email" => "hannah_wilson56@hotmail.com",
        "mobile" => "0491181142",
        "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Todd verrills",
        "open_day_ticket_qty" => "2",
        "email" => "toddverrills@gmail.com",
        "mobile" => "0434783074",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lachlan Vane",
        "open_day_ticket_qty" => "2",
        "email" => "lachlanv2000.lv@gmail.com",
        "mobile" => "0432145942",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Lharni Moran",
        "open_day_ticket_qty" => "4",
        "email" => "lharnic@gmail.com",
        "mobile" => "0432338102",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Haley Paton",
        "open_day_ticket_qty" => "2",
        "email" => "hpaton94@gmail.com",
        "mobile" => "0401009763",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Kylie Marsh",
        "open_day_ticket_qty" => "2",
        "email" => "misskyliejane@hotmail.com",
        "mobile" => "0421198598",
        "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Tahlia Gageler",
        "open_day_ticket_qty" => "2",
        "email" => "tahlia.gageler@hotmail.com",
        "mobile" => "0400455707",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Matthew Wangmann",
        "open_day_ticket_qty" => "2",
        "email" => "matthewwangmann96@gmail.com",
        "mobile" => "0459208993",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Georgia Bailey",
        "open_day_ticket_qty" => "4",
        "email" => "georgiajacobplan@gmail.com",
        "mobile" => "0429987057",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Hollie Jones",
        "open_day_ticket_qty" => "2",
        "email" => "hollie.marie.jones93@hotmail.com",
        "mobile" => "0401314129",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Kiandra Ross",
        "open_day_ticket_qty" => "4",
        "email" => "kiandra1404@gmail.com",
        "mobile" => "0438464286",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Katrina Lim",
        "open_day_ticket_qty" => "2",
        "email" => "katrina.lim@live.com.au",
        "mobile" => "0426587810",
        "password" => Hash::make('NouveauC0de'),
        ]);


        $user = User::create([
        "name" => "Joanne Brind",
        "open_day_ticket_qty" => "2",
        "email" => "jobrind71@outlook.com",
        "mobile" => "0408688213",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Celeste Ambalong",
        "open_day_ticket_qty" => "2",
        "email" => "celesteambalong@gmail.com",
        "mobile" => "0406258481",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rebecca Chapman",
        "open_day_ticket_qty" => "2",
        "email" => "rebeccachapman83@gmail.com",
        "mobile" => "0450248932",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Sophie Gill",
        "open_day_ticket_qty" => "6",
        "email" => "arndellwedding@gmail.com",
        "mobile" => "0430204593",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Eliesha Kelly",
        "open_day_ticket_qty" => "2",
        "email" => "eliesha.kelly@outlook.com",
        "mobile" => "0423344874",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Adam Turner",
        "open_day_ticket_qty" => "1",
        "email" => "adamturner918@gmail.com",
        "mobile" => "0422243112",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Claire Spain",
        "open_day_ticket_qty" => "2",
        "email" => "claire.spain1998@gmail.com",
        "mobile" => "0439996334",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Mel Schultz",
        "open_day_ticket_qty" => "4",
        "email" => "mel.smith@live.com.au",
        "mobile" => "0431719196",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Sam Binkin",
        "open_day_ticket_qty" => "2",
        "email" => "talea.d@live.com.au",
        "mobile" => "0437774044",
        "password" => Hash::make('NouveauC0de'),
        ]);



        $user = User::create([
        "name" => "Rebecca Hide",
        "open_day_ticket_qty" => "3",
        "email" => "rebeccahide1@gmail.com",
        "mobile" => "0402691680",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Maddie Charnock",
        "open_day_ticket_qty" => "2",
        "email" => "maddiecharnock@gmail.com",
        "mobile" => "0488397316",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Claudia Bourke",
        "open_day_ticket_qty" => "2",
        "email" => "claudia.1196@hotmail.com",
        "mobile" => "0401570718",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Blythe Quick",
        "open_day_ticket_qty" => "2",
        "email" => "blythe.quick@hotmail.com",
        "mobile" => "0414975128",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "tessa Leal",
        "open_day_ticket_qty" => "2",
        "email" => "tessaleal13@gmail.com",
        "mobile" => "0401548628",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Tanya Blower",
        "open_day_ticket_qty" => "2",
        "email" => "tanyajanelle@hotmail.com",
        "mobile" => "0451477783",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Laura Johnson",
        "open_day_ticket_qty" => "4",
        "email" => "lauraellenjohnson6@gmail.com",
        "mobile" => "0401710891",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Koner Mills",
        "open_day_ticket_qty" => "6",
        "email" => "koner1005@gmail.com",
        "mobile" => "0411655072",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Tayla Windred",
        "open_day_ticket_qty" => "1",
        "email" => "windredtayla@gmail.com",
        "mobile" => "0488084538",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Rebecca Raynor",
        "open_day_ticket_qty" => "2",
        "email" => "rebeccaraynor@icloud.com",
        "mobile" => "0437772424",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Eliza-jane Mulligan",
        "open_day_ticket_qty" => "1",
        "email" => "elizajanemulligan16@gmail.com",
        "mobile" => "0476646100",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Bella Romeo",
        "open_day_ticket_qty" => "2",
        "email" => "bella.romeo1@hotmail.com",
        "mobile" => "0436457174",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Shantelle Learmouth",
        "open_day_ticket_qty" => "2",
        "email" => "brindalear@outlook.com",
        "mobile" => "0408685213",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Elkie Shorrocks",
        "open_day_ticket_qty" => "2",
        "email" => "eshorrocks@rdd.net.au",
        "mobile" => "0423409448",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Casey Linabury",
        "open_day_ticket_qty" => "4",
        "email" => "caseylino84@gmail.com",
        "mobile" => "0419798414",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Taylah Walton",
        "open_day_ticket_qty" => "2",
        "email" => "taylahwalton@outlook.com",
        "mobile" => "0478133050",
        "password" => Hash::make('NouveauC0de'),
        ]);

        $user = User::create([
        "name" => "Alyssa Hillman",
        "open_day_ticket_qty" => "5",
        "email" => "alyssa.hillman@outlook.com",
        "mobile" => "0437786458",
        "password" => Hash::make('NouveauC0de'),
        ]);


    }
}
