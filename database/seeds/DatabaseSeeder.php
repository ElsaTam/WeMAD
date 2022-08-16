<?php

use Illuminate\Database\Seeder;

use App\Models\People\Person;
use App\Models\People\Vampire;
use App\Models\People\Warlock;
use App\Models\People\Werewolf;
use App\Models\CriminalRecord;
use App\Faker\Data\PlacesData;
use App\Custom\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->delete();

        DB::table('groups')->delete();
        DB::table('group_types')->delete();

        DB::table('states')->delete();

        srand(31);

        $this->call(StateSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(CriminalRecordSeeder::class);
        $this->call(PhotoSeeder::class);

        //$this->populate_random();
    }


    private function populate_random()
    {
        $offices = PlacesData::offices();
        $prisons = PlacesData::prisons();

        $n_wanteds = 212; // 212
        $n_missings = 43; // 43
        $n_prisoners = [
            'min' => 20, // 20
            'max' => 60 // 60
        ];
        $n_vampires = [
            'min' => 3, // 3
            'max' => 10, // 10
            'renegades' => 228, // 228
            'deads' => 513 // 513
        ];
        $pick_sires = True; // True
        $n_warlocks = [
            'min' => 2, // 2
            'max' => 7, // 7
            'renegades' => 68, // 65
            'deads' => 0 // 248
        ];
        $n_werewolves = [
            'min' => 1, // 4
            'max' => 15, // 15
            'renegades' => 113, // 113
            'deads' => 0 // 1065
        ];
        $n_humans = 112; // 112
        $n_agents = [
            'min' => 15, // 15
            'max' => 30 // 30
        ];

        // Wanteds
        echo "Seeding Wanteds...\n";
        factory(Person::class, $n_wanteds)
            ->create(['status' => 'wanted'])
            ->each(function ($person) {
                factory(CriminalRecord::class)
                    ->make(['person_id' => $person->id])
                    ->save();
        });

        // Missings
        echo "Seeding Missings...\n";
        factory(Person::class, $n_missings)
            ->create(['status' => 'missing']);
            
        // Prisoners
        echo "Seeding Prisoners...\n";
        foreach ($prisons as $id => $value) {
            $n_members = $n_prisoners['max'] > $n_prisoners['min'] ? rand($n_prisoners['min'], $n_prisoners['max']) : 0;
            factory(Person::class, $n_members)
                ->states('human')
                ->create([
                    'place_id' => $id,
                    'status' => 'prisoner'
                ]);
        }

        echo "Seeding Vampires...\n";
        $this->random_type('vampire', 'clan', $n_vampires);
        echo "Seeding Warlocks...\n";
        $this->random_type('warlock', 'circle', $n_warlocks);
        echo "Seeding Werewolves...\n";
        $this->random_type('werewolf', 'pack', $n_werewolves);

        // Create sires and breed
        echo "Seeding Sires...\n";
        if ($pick_sires) {
            $vampires = DB::table("people")
                ->where('type', 'vampire')
                ->get();
            foreach ($vampires as $vampire) {
                $sire = $this->random_sire($vampires, $vampire);
                DB::table('people')->where('id', $vampire->id)->update(['sire_id' => $sire]);
            }
        }

        // Humans
        echo "Seeding Humans...\n";
        factory(Person::class, $n_humans)
            ->states('human')
            ->create();

        // Agents
        echo "Seeding Agents...\n";
        foreach ($offices as $id => $value) {
            if ($id == "office_lasvegas_nv") continue;
            $n_members = $n_agents['max'] > $n_agents['min'] ? rand($n_agents['min'], $n_agents['max']) : 0;
            factory(Person::class, $n_members)
                ->states('human')
                ->create([
                    'place_id' => $id,
                    'status' => 'agent'
                ]);
        }
    }


    private function random_type(string $state, string $type, $n_people)
    {
        $offices = PlacesData::offices();
        foreach ($offices as $id => $value) {
            if ($id == "office_lasvegas_nv") continue;

            $groups = DB::table('groups')->where('office_id', $id)->where('group_type_id', $type)->get();
            foreach ($groups as $group) {
                $n_members = $n_people['max'] > $n_people['min'] ? rand($n_people['min'], $n_people['max']) : 0;
                factory(Person::class, $n_members)->states($state)->create(['group_id' => $group->id]);

                $leader = DB::table('people')->where('group_id', $group->id)->first();
                if ($leader) {
                    DB::table('groups')->where('id', $group->id)->update(['leader_id' => $leader->id]);
                    if ($state == "vampire") {
                        DB::table('people')->where('id', $leader->id)->update(['self_control' => True]); // Leader always has self-control
                    }
                }
            }
        }
        factory(Person::class, $n_people['renegades'])
            ->states($state)
            ->create([ 'group_id' => NULL]);
        factory(Person::class, $n_people['deads'])
            ->states($state)
            ->create([ 'group_id' => NULL, 'dead' => True]);
    }
    

    private function random_sire(Illuminate\Support\Collection $all_vampires, stdClass $vampire)
    {
        if ($vampire->sire_id) return $vampire->sire_id; // A sire has already been set (manually)

        $known_sire = rand(1, 100) < 70;
        if (! $known_sire) return NULL; // We don't know the sire

        $same_clan = rand(1, 100) < 50; // The sire is currently in the same clan
        if ($same_clan && $vampire->group_id != NULL) $all_vampires = $all_vampires->where("clan_id", "!=", $vampire->group_id);

        // Remove the younger vampires
        $vampire_age = Date::parse($vampire->birth_date)->age();
        $possible_sires = collect([]);
        foreach ($all_vampires as $sire) {
            $sire_age = Date::parse($sire->birth_date)->age();
            if ($sire_age > $vampire_age) {
                $possible_sires->push($sire);
            }
        }

        // If no possible sire, no known sire
        if (count($possible_sires) == 0) return NULL;
        
        // Pick one randomly
        $chosen_sire = $possible_sires->random();
        return $chosen_sire->id;
    }
}