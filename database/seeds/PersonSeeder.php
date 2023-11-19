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

    private function seed_handmade()
    {
        include 'handmade/People.php';

        // ------
        // AGENTS
        // ------

        // Bosses
        DB::table('people')->insert($office_bosses);
        // Add boss_id to the office
        foreach ($office_bosses as $boss) {
            DB::table('places')->where('id', $boss['place_id'])->update(['boss_id' => $boss['id']]);
        }

        // Hunters
        DB::table('people')->insert($hunters);

        // ----------------
        // HIDDEN CREATURES
        // ----------------

        // Vampire
        $vampires_copy = $vampires;
        //foreach ($vampires_copy as $key => $vampire) {
        //    $vampires_copy[$key]['sire_id'] = NULL;
        //}
        DB::table('people')->insert($vampires_copy);
        // Add sires (for vampires)
        $vampires_copy = array_filter($vampires, function ($vampire) {
            return ! $vampire['sire_id'];
        });
        foreach ($vampires_copy as $vampire) {
            DB::table('people')->where('id', $vampire['id'])->update(['sire_id' => $vampire['sire_id']]);
        }

        // Warlocks
        $warlocks_copy = $warlocks;
        foreach ($warlocks_copy as $key => $warlock) {
            $warlocks_copy[$key]['demon_id'] = NULL;
        }
        DB::table('people')->insert($warlocks_copy);
        // Add demons (for warlocks)
        $warlocks_copy = array_filter($warlocks, function ($warlock) {
            return ! $warlock['demon_id'];
        });
        foreach ($warlocks_copy as $warlock) {
            DB::table('people')->where('id', $warlock['id'])->update(['demon_id' => $warlock['demon_id']]);
        }
        
        // Werewolves
        DB::table('people')->insert($werewolves);
        
        // Demons
        DB::table('people')->insert($demons);

        // ------
        // WANTED
        // ------

        DB::table('people')->insert($wanteds);

        // ------
        // PRISONERS
        // ------

        DB::table('people')->insert($prisoners);
    }

    private function seed_generated()
    {
        include 'generated/People.php';

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

    private function update_leaders_generated()
    {
        include 'generated/Groups.php';

        // Add leader to the groups
        foreach ($groups_generated as $group) {
            DB::table('groups')->where('id', $group['id'])->update(['leader_id' => $group['leader_id']]);
        }
    }

    private function update_leaders_handmade()
    {
        include 'handmade/Groups.php';

        // Add leader to the groups
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
        $this->seed_generated();
        $this->seed_handmade();

        // Deal with foreign keys
        $this->update_leaders_generated();
        $this->update_leaders_handmade();
    }
}
