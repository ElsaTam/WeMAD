<?php

use Illuminate\Database\Seeder;
use App\Custom\Date;
use App\Faker\Helper;

class PersonSeeder extends Seeder
{
    private $helper;

    function __construct()
    {
        $this->helper = new Helper();
    }

    private function seed_wanteds()
    {
        // Otto
        DB::table('people')->insert([
            'id' => "otto",
            'last_name' => "Otto",
            'aliases' => "Otto",
            'status' => "wanted",
            'hair' => "Blond",
            'eyes' => "Vert",
            'sex' => "male",
            'ethnic_group' => "white",
            'type' => "warlock",
            'languages' => "Anglais",
            'place_id' => "office_newyork_ny"
        ]);
        
        // Basriel Nix
        DB::table('people')->insert([
            'id' => "basrielnix",
            'first_name' => "Basriel",
            'last_name' => "Nix",
            'aliases' => "Basriel Nix",
            'status' => "wanted",
            'birth_date' => '06/06/1996',
            'birth_place' => "Nouveau-Mexique, Etats-Unis",
            'hair' => "Noirs",
            'eyes' => "Marron",
            'height' => 191,
            'weight' => 85,
            'sex' => "male",
            'ethnic_group' => "white",
            'type' => "warlock",
            'languages' => "Anglais, Démoniaque (supposé)",
            'place_id' => "office_lasvegas_nv"
        ]);
        
        // Clayton Moore, Le Doc
        DB::table('people')->insert([
            'id' => "claytonmoore",
            'first_name' => "Clayton",
            'last_name' => "Moore",
            'aliases' => "Clayton Moore, Le Doc, Docteur",
            'status' => "wanted",
            'birth_date' => '30/05/1970',
            'birth_place' => "Athens, Georgie, Etats-Unis",
            'hair' => "Chatain",
            'eyes' => "Bleus",
            'height' => 182,
            'weight' => 81,
            'sex' => "male",
            'ethnic_group' => "white",
            'type' => "human",
            'languages' => "Anglais, Allemand, Espagnol",
            'place_id' => "office_lasvegas_nv"
        ]);
        
        // L'male Masque
        DB::table('people')->insert([
            'id' => "hommemasque",
            'first_name' => "L'",
            'last_name' => "male Masqué",
            'aliases' => "L'male Masqué",
            'status' => "wanted",
            'sex' => "male",
            'languages' => "Anglais",
            'place_id' => "office_newyork_ny"
        ]);
    }

    private function insert_agent(string $first_name, string $last_name, string $sex, string $ethnic_group, string $birth_date, string $birth_place, string $office, string $photo_ext = "jpg")
    {
        $id = $this->helper->create_id($first_name, $last_name);
        DB::table('people')->insert([
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'status' => "agent",
            'birth_date' => $birth_date,
            'birth_place' => $birth_place,
            'sex' => $sex,
            'ethnic_group' => $ethnic_group,
            'type' => "human",
            'languages' => "Anglais",
            'place_id' => "office_".$office
        ]);
        DB::table('photos')->insert([
            'id' => $id."_1",
            'src' => "/storage/pictures/agents/".$first_name."_".$last_name."_1.".$photo_ext,
            'person_id' => $id
        ]);
    }

    private function insert_boss_agent(string $first_name, string $last_name, string $sex, string $ethnic_group, string $birth_date, string $birth_place, string $office, string $photo_ext = "jpg")
    {
        $this->insert_agent($first_name, $last_name, $sex, $ethnic_group, $birth_date, $birth_place, $office, $photo_ext);
        $id = $this->helper->create_id($first_name, $last_name);
        DB::table('places')->where('id', "office_".$office)->update(['boss_id' => $id]);
    }

    private function seed_boss_agents()
    {
        // Evelyn Morrison
        $this->insert_boss_agent(
            "Evelyn",
            "Morrison",
            "female",
            "white",
            "13/03/1966",
            "Edmonton, Alberta, Canada",
            "lasvegas_nv",
            "png"
        );
        DB::table('people')->where('id', 'evelynmorrison')->update([
            'aliases' => "Evelyn Morrison, Petit Coeur",
            'hair' => 'Châtain',
            'eyes' => 'Marrons',
            'height' => 173,
            'weight' => 89,
            'languages' => "Anglais, Démoniaque"
        ]);

        // Willard Elsmore
        $this->insert_boss_agent(
            "Willard",
            "Elsmore",
            "male",
            "white",
            "30/06/1972",
            "Mesa, Arizona, Etats-Unis",
            "phoenix_az"
        );

        // Glen Carver
        $this->insert_boss_agent(
            "Glen",
            "Carver",
            "male",
            "white",
            "15/12/1964",
            "Lincoln, Nebraska, Etats-Unis",
            "seattle_wa"
        );

        // Devon Devlin
        $this->insert_boss_agent(
            "Devon",
            "Devlin",
            "male",
            "white",
            "24/01/1981",
            "Roseville, Michigan, Etats-Unis",
            "reno_nv"
        );

        // Dominic Browing
        $this->insert_boss_agent(
            "Dominic",
            "Browing",
            "male",
            "white",
            "03/07/1954",
            "East Hartford, Connecticut, Etats-Unis",
            "littlerock_ar"
        );

        // Alexis Jensen
        $this->insert_boss_agent(
            "Alexis",
            "Jensen",
            "male",
            "white",
            "22/08/1973",
            "La Cienega, Nouveau-Mexique, Etats-Unis",
            "albuquerque_nm"
        );

        // Andre Duvall
        $this->insert_boss_agent(
            "Andre",
            "Duvall",
            "male",
            "white",
            "01/01/1980",
            "Johnstown, Pennsylvania, Etats-Unis",
            "jackson_ms"
        );

        // Corrina Lawsom
        $this->insert_boss_agent(
            "Corrina",
            "Lawsom",
            "female",
            "white",
            "20/01/1954",
            "New York, New York, Etats-Unis",
            "charlotte_nc"
        );

        // Ernie Colon
        $this->insert_boss_agent(
            "Ernie",
            "Colon",
            "female",
            "white",
            "12/03/1961",
            "Glasgow, Kentucky, Etats-Unis",
            "saintlouis_mo"
        );

        // Emile Ferry
        $this->insert_boss_agent(
            "Emile",
            "Ferry",
            "male",
            "white",
            "13/05/1976",
            "Garden Grove, Californie, Etats-Unis",
            "portland_or"
        );

        // Daniela Mcadams
        $this->insert_boss_agent(
            "Daniela",
            "Mcadams",
            "female",
            "white",
            "13/07/1970",
            "Lake Los Angeles, Californie, Etats-Unis",
            "casper_wy"
        );

        // Maurine Rainey
        $this->insert_boss_agent(
            "Maurine",
            "Rainey",
            "female",
            "white",
            "08/06/1985",
            "Saxon, Caroline du Sud, Etats-Unis",
            "denver_co"
        );
        DB::table('people')->where('id', 'maurinerainey')->update(['languages' => "Anglais, Français"]);

        // Tomas Powell
        $this->insert_boss_agent(
            "Tomas",
            "Powell",
            "male",
            "white",
            "11/05/1974",
            "Los Angeles, Californie, Etats-Unis",
            "losangeles_ca"
        );

        // Rupert Nolan
        $this->insert_boss_agent(
            "Rupert",
            "Nolan",
            "male",
            "white",
            "24/10/1967",
            "Coachella, Californie, Etats-Unis",
            "sanfrancisco_ca"
        );

        // Luke Mast
        $this->insert_boss_agent(
            "Luke",
            "Mast",
            "male",
            "black",
            "28/05/1984",
            "Billings, Montana, Etats-Unis",
            "billings_mt"
        );

        // Leon Smith
        $this->insert_boss_agent(
            "Leon",
            "Smith",
            "male",
            "white",
            "25/11/1968",
            "New Braunfels, Texas, Etats-Unis",
            "boise_id"
        );

        // Trevor Starr
        $this->insert_boss_agent(
            "Trevor",
            "Starr",
            "male",
            "white",
            "26/06/1969",
            "Fish Hawk, Floride, Etats-Unis",
            "saltlakecity_ut"
        );

        // Aurelio Conte
        $this->insert_boss_agent(
            "Aurelio",
            "Conte",
            "male",
            "white",
            "16/07/1992",
            "Yakima, Washington, Etats-Unis",
            "spokane_wa"
        );

        // Earl Austin
        $this->insert_boss_agent(
            "Earl",
            "Austin",
            "male",
            "white",
            "01/08/1989",
            "Newark, Ohio, Etats-Unis",
            "desmoines_ia"
        );

        // Eriberto Caballeros
        $this->insert_boss_agent(
            "Eriberto",
            "Caballeros",
            "male",
            "white",
            "16/06/1982",
            "Edmond, Oklahoma, Etats-Unis",
            "chicago_il"
        );

        // Mansir Nwosu
        $this->insert_boss_agent(
            "Mansir",
            "Nwosu",
            "male",
            "black",
            "27/01/1973",
            "Nouvelle-Orléans, Louisiane, Etats-Unis",
            "nouvelleorleans_la"
        );

        // Donnell Kelley
        $this->insert_boss_agent(
            "Donnell",
            "Kelley",
            "male",
            "white",
            "04/10/1978",
            "Tenafly, New Jersey, Etats-Unis",
            "minneapolis_mn"
        );

        // Cliff Fischer
        $this->insert_boss_agent(
            "Cliff",
            "Fischer",
            "male",
            "white",
            "28/08/1967",
            "Grafton, North Dakota, Etats-Unis",
            "oklahomacity_ok"
        );

        // Eroll Jewell
        $this->insert_boss_agent(
            "Eroll",
            "Jewell",
            "male",
            "black",
            "25/06/1988",
            "Fostoria, Ohio, Etats-Unis",
            "siouxfalls_sd"
        );

        // Marshall Richardson
        $this->insert_boss_agent(
            "Marshall",
            "Richardson",
            "male",
            "white",
            "18/08/1986",
            "Fountain Valley, Californie, Etats-Unis",
            "dodgecity_ks"
        );

        // Ryan Zamora
        $this->insert_boss_agent(
            "Ryan",
            "Zamora",
            "male",
            "white",
            "09/02/1990",
            "Glen Ellyn, Illinois, Etats-Unis",
            "lincoln_ne"
        );

        // Lucy Livingston
        $this->insert_boss_agent(
            "Lucy",
            "Livingston",
            "female",
            "white",
            "06/05/1979",
            "Athens, Alabama, Etats-Unis",
            "bismarck_nd"
        );

        // Bonnie Soria
        $this->insert_boss_agent(
            "Bonnie",
            "Soria",
            "female",
            "white",
            "02/10/1974",
            "Fort Worth, Texas, Etats-Unis",
            "odessa_tx"
        );

        // Aaron Brand
        $this->insert_boss_agent(
            "Aaron",
            "Brand",
            "male",
            "white",
            "08/06/1971",
            "Beaumont, Texas, Etats-Unis",
            "kansascity_ks"
        );

        // Jake Sharp
        $this->insert_boss_agent(
            "Jake",
            "Sharp",
            "male",
            "white",
            "29/03/1966",
            "Arvada, Colorado, Etats-Unis",
            "sanantonio_tx"
        );

        // Leland Feldman
        $this->insert_boss_agent(
            "Leland",
            "Feldman",
            "male",
            "white",
            "02/09/1964",
            "South Whittier, Californie, Etats-Unis",
            "rapidcity_sd"
        );

        // Arthur Matteson
        $this->insert_boss_agent(
            "Arthur",
            "Matteson",
            "male",
            "white",
            "23/02/1970",
            "Lake Shore, Maryland, Etats-Unis",
            "milwaukee_wi"
        );

        // Jeremy Finch
        $this->insert_boss_agent(
            "Jeremy",
            "Finch",
            "male",
            "white",
            "21/05/1978",
            "Waco, Texas, Etats-Unis",
            "dallas_tx"
        );

        // Guy Love
        $this->insert_boss_agent(
            "Guy",
            "Love",
            "male",
            "white",
            "16/01/1967",
            "Manteca, Californie, Etats-Unis",
            "atlanta_ga"
        );

        // Joseph Kyle
        $this->insert_boss_agent(
            "Joseph",
            "Kyle",
            "male",
            "white",
            "16/10/1964",
            "Los Angeles, Californie, Etats-Unis",
            "birmingham_al"
        );

        // Lance Leroy
        $this->insert_boss_agent(
            "Lance",
            "Leroy",
            "male",
            "white",
            "27/04/1973",
            "Decatur, Alabama, Etats-Unis",
            "jacksonville_fl"
        );

        // Tylor Walters
        $this->insert_boss_agent(
            "Tylor",
            "Walters",
            "male",
            "white",
            "10/03/1965",
            "Shepherdsville, Kentucky, Etats-Unis",
            "washington_dc"
        );

        // Herbert Leroy
        $this->insert_boss_agent(
            "Herbert",
            "Leroy",
            "male",
            "white",
            "24/11/1976",
            "Richmond, Kentucky, Etats-Unis",
            "miami_fl"
        );

        // Willis Weldon
        $this->insert_boss_agent(
            "Willis",
            "Weldon",
            "male",
            "white",
            "13/01/1970",
            "Midvale, Utah, Etats-Unis",
            "indianapolis_in"
        );

        // Jace Caldera
        $this->insert_boss_agent(
            "Jace",
            "Caldera",
            "male",
            "white",
            "03/11/1980",
            "Salinas, Californie, Etats-Unis",
            "louisville_ky"
        );

        // Ngok Delong
        $this->insert_boss_agent(
            "Ngok",
            "Delong",
            "female",
            "asian",
            "01/09/1983",
            "Hòa Bình, Viêt Nam",
            "bangor_me"
        );

        // Elliott Sides
        $this->insert_boss_agent(
            "Elliott",
            "Sides",
            "male",
            "white",
            "12/09/1973",
            "Stansbury Park, Utah, Etats-Unis",
            "detroit_mi"
        );

        // Sheldon Riggs
        $this->insert_boss_agent(
            "Sheldon",
            "Riggs",
            "male",
            "white",
            "22/02/1966",
            "New York, New York, Etats-Unis",
            "newyork_ny"
        );

        // Buddy Lambert
        $this->insert_boss_agent(
            "Buddy",
            "Lambert",
            "male",
            "white",
            "23/08/1977",
            "Oswego, New York, Etats-Unis",
            "watertown_ny"
        );

        // Kobe Rush
        $this->insert_boss_agent(
            "Kobe",
            "Rush",
            "male",
            "white",
            "17/02/1971",
            "Chicago, Illinois, Etats-Unis",
            "colombus_oh"
        );

        // Michael Archibald
        $this->insert_boss_agent(
            "Michael",
            "Archibald",
            "male",
            "white",
            "19/11/1976",
            "Sioux Falls, South Dakota, Etats-Unis",
            "pittsburgh_pa"
        );

        // Jim Kirby
        $this->insert_boss_agent(
            "Jim",
            "Kirby",
            "male",
            "white",
            "27/11/1983",
            "Louisville, Colorado, Etats-Unis",
            "philadelphie_pa"
        );

        // Philip Patten
        $this->insert_boss_agent(
            "Philip",
            "Patten",
            "male",
            "white",
            "14/05/1967",
            "Oak Grove, Texas, Etats-Unis",
            "providence_ri"
        );

        // Fabrice Ohara
        $this->insert_boss_agent(
            "Fabrice",
            "Ohara",
            "male",
            "white",
            "29/05/1982",
            "Wicklow, Irelande",
            "charleston_sc"
        );

        // Aubrey Faust
        $this->insert_boss_agent(
            "Aubrey",
            "Faust",
            "female",
            "white",
            "19/11/1968",
            "Nashville, Tennessee, Etats-Unis",
            "nashville_tn"
        );

        // Rickey Cornell
        $this->insert_boss_agent(
            "Rickey",
            "Cornell",
            "male",
            "black",
            "14/05/1967",
            "Baton Rouge, Louisiane, Etats-Unis",
            "lynchburg_va"
        );

        // Janie Wheeler
        $this->insert_boss_agent(
            "Janie",
            "Wheeler",
            "female",
            "black",
            "15/07/1966",
            "Lee's Summit, Missouri, Etats-Unis",
            "charleston_wv"
        );

        // Rich Worthy
        $this->insert_boss_agent(
            "Rich",
            "Worthy",
            "male",
            "white",
            "23/05/1977",
            "Anchorage, Alaska, Etats-Unis",
            "anchorage_ak"
        );

        // Tukkuttok Apaata
        $this->insert_boss_agent(
            "Tukkuttok",
            "Apaata",
            "male",
            "nativeamerican",
            "18/06/1978",
            "Huslia, Alaska, Etats-Unis",
            "anaktuvukpass_ak"
        );

        // Jeffrey Crisostomo
        $this->insert_boss_agent(
            "Jeffrey",
            "Crisostomo",
            "male",
            "white",
            "26/03/1982",
            "Hagåtña, Guam",
            "hagatna_gu"
        );

        // Wana'ao Pekelo
        $this->insert_boss_agent(
            "Wana'ao",
            "Pekelo",
            "male",
            "black",
            "18/02/1972",
            "Honolulu, Hawaii, Etats-Unis",
            "honolulu_hi"
        );

        // Harry Liwai
        $this->insert_boss_agent(
            "Harry",
            "Liwai",
            "male",
            "black",
            "21/12/1960",
            "Fremont, Californie, Etats-Unis",
            "waikoloavillage_hi"
        );

        // Gerardo Ortega
        $this->insert_boss_agent(
            "Gerardo",
            "Ortega",
            "male",
            "hispanic",
            "20/05/1965",
            "Utuado, Porto Rico",
            "sanjuan_pr"
        );
    }

    private function seed_handmade()
    {
        include 'handmade\People.php';

        // AGENTS
        foreach ($agents as $key => $person) {
            DB::table('people')->insert($person);
        }



        // OTHERS

        $people = array_merge($vampires, $warlocks, $werewolves);

        // Insert everyone without reference to people table
        $people_copy = $people;
        foreach ($people_copy as $key => $person) {
            $people_copy[$key]['sire_id'] = NULL;
            $people_copy[$key]['demon_id'] = NULL;
            DB::table('people')->insert($people_copy[$key]);
        }

        // Add sires (for vampires)
        $people_copy = array_filter($vampires, function ($person) {
            if (! array_key_exists('sire_id', $person)) return false;
            return ! $person['sire_id'];
        });
        foreach ($people_copy as $person) {
            DB::table('people')->where('id', $person['id'])->update(['sire_id' => $person['sire_id']]);
        }

        // Add demons (for warlocks)
        $people_copy = array_filter($warlocks, function ($person) {
            if (! array_key_exists('demon_id', $person)) return false;
            return ! $person['demon_id'];
        });
        foreach ($people_copy as $person) {
            DB::table('people')->where('id', $person['id'])->update(['demon_id' => $person['demon_id']]);
        }
    }

    private function seed_generated()
    {
        include 'generated\People.php';

        // Insert everyone without reference to people table
        $people_copy = $people;
        foreach ($people_copy as $key => $person) {
            $people_copy[$key]['sire_id'] = NULL;
            $people_copy[$key]['demon_id'] = NULL;
        }
        foreach (array_chunk($people_copy, 500) as $subset) {
            DB::table('people')->insert($subset);
        };

        // Add sires (for vampires)
        $people_copy = array_filter($people, function ($person) {
            return $person['sire_id'] != NULL;
        });
        foreach ($people_copy as $person) {
            DB::table('people')->where('id', $person['id'])->update(['sire_id' => $person['sire_id']]);
        }

        // Add demons (for warlocks)
        $people_copy = array_filter($people, function ($person) {
            return $person['demon_id'] != NULL;
        });
        foreach ($people_copy as $person) {
            DB::table('people')->where('id', $person['id'])->update(['demon_id' => $person['demon_id']]);
        }
    }

    private function update_leaders()
    {
        include 'generated\Groups.php';
        include 'generated\People.php';

        // Add leader to the groups
        $groups = array_merge($clans, $circles, $packs, $groups_generated);
        foreach ($groups as $group) {
            DB::table('groups')->where('id', $group['id'])->update(['leader_id' => $group['leader_id']]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_wanteds();
        $this->seed_boss_agents();
        $this->seed_handmade();
        $this->seed_generated();

        // Deal with foreign keys
        $this->update_leaders();
    }
}
