<?php

use Illuminate\Database\Seeder;

use App\Models\People\Person;
use App\Models\People\Vampire;
use App\Models\People\Warlock;
use App\Models\People\Werewolf;
use App\Models\Records\CriminalRecord;
use App\Models\Records\PrisonerRecord;
use App\Models\Records\Crime;
use App\Faker\Helper;
use App\Faker\Data\PlacesData;
use App\Faker\PlaceFaker;
use App\Faker\CriminalRecordFaker;
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

        srand(32);

        $this->call(StateSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(CriminalRecordSeeder::class);
        $this->call(PhotoSeeder::class);

        //$this->populate_random();
        //$this->tmp_random_crimes();
    }

    private function tmp_random_crimes()
    {
        $helper = new Helper();

        $wanteds = Person::where('status', 'wanted')->get();
        foreach ($wanteds as $wanted) {
            $n_crimes = $helper->weighted_random([
                1 => 70,
                2 => 20,
                3 => 10
            ]);
            $place_faker = new PlaceFaker();
            $crime_faker = new CriminalRecordFaker();
            for ($i = 0; $i < $n_crimes; ++$i) {
                factory(Crime::class)
                    ->states('wanted')
                    ->create([
                        'person_id' => $wanted->id,
                        'state_id' => $wanted->place->state->id,
                        'city' => $place_faker->usa_city($wanted->place->state->id),
                        'date' => $crime_faker->crime_date($wanted->age)
                    ]);
                }
            factory(CriminalRecord::class)
                ->state($n_crimes.'_crimes')
                ->create(['person_id' => $wanted->id]);
        }

        $prisoners = Person::where('status', 'prisoner')->get();
        foreach ($prisoners as $prisoner) {
            $n_crimes = $helper->weighted_random([
                1 => 20, 2 => 70, 3 => 30, 4 => 10, 5 => 10, 6 => 3, 7 => 1, 8 => 1
            ]);
            $place_faker = new PlaceFaker();
            $crime_faker = new CriminalRecordFaker();
            for ($i = 0; $i < $n_crimes; ++$i) {
                factory(Crime::class)
                    ->states('wanted')
                    ->create([
                        'person_id' => $prisoner->id,
                        'state_id' => $prisoner->place->state->id,
                        'city' => $place_faker->usa_city($prisoner->place->state->id),
                        'date' => $crime_faker->crime_date($prisoner->age)
                    ]);
            }
            factory(PrisonerRecord::class)
                ->state($n_crimes.'_crimes')
                ->create(['person_id' => $prisoner->id]);
        }
    }


    private function insert(string $table, $model) {
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            $data[$key] = $value;
        }
        DB::table($table)->insert($data);
    }

    private function populate_random()
    {
        $helper = new Helper();

        $offices = PlacesData::offices();
        $prisons = PlacesData::prisons();

        $n_wanteds = 212; // 212
        $n_missings = 0; // 43
        $n_prisoners = [
            'min' => 20, // 20
            'max' => 60 // 60
        ];
        $n_vampires = [
            'min' => 0, // 3
            'max' => 0, // 10
            'renegades' => 0, // 228
            'deads' => 0 // 513
        ];
        $pick_sires = False; // True
        $n_warlocks = [
            'min' => 0, // 2
            'max' => 0, // 7
            'renegades' => 0, // 65
            'deads' => 0 // 248
        ];
        $n_werewolves = [
            'min' => 0, // 4
            'max' => 0, // 15
            'renegades' => 0, // 113
            'deads' => 0 // 1065
        ];
        $n_humans = 0; // 112
        $n_agents = [
            'min' => 0, // 15
            'max' => 0 // 30
        ];

        // Wanteds
        echo "Seeding Wanteds...\n";
        factory(Person::class, $n_wanteds)
            ->make(['status' => 'wanted'])
            ->each(function ($person) use ($helper) {
                $this->insert('people', $person);
                $n_crimes = $helper->weighted_random([
                    1 => 70,
                    2 => 20,
                    3 => 10
                ]);
                $place_faker = new PlaceFaker();
                $crime_faker = new CriminalRecordFaker();
                for ($i = 0; $i < $n_crimes; ++$i) {
                    factory(Crime::class)
                        ->states('wanted')
                        ->create([
                            'person_id' => $person->id,
                            'state_id' => $person->place->state->id,
                            'city' => $place_faker->usa_city($person->place->state->id),
                            'date' => $crime_faker->crime_date($person->age)
                        ]);
                    }
                factory(CriminalRecord::class)
                    ->state($n_crimes.'_crimes')
                    ->create(['person_id' => $person->id]);
        });

        // Missings
        echo "Seeding Missings...\n";
        factory(Person::class, $n_missings)
            ->make(['status' => 'missing'])
            ->each(function ($person) {
                $this->insert("people", $person);
            });
            
        
            // Prisoners
        echo "Seeding Prisoners...\n";
        foreach ($prisons as $id => $value) {
            $n_members = $n_prisoners['max'] > $n_prisoners['min'] ? rand($n_prisoners['min'], $n_prisoners['max']) : 0;
            factory(Person::class, $n_members)
                ->make([
                    'place_id' => $id,
                    'status' => 'prisoner'
                ])
                ->each(function ($person) use ($helper) {
                    $this->insert('people', $person);
                    $n_crimes = $helper->weighted_random([
                        1 => 20, 2 => 70, 3 => 30, 4 => 10, 5 => 10, 6 => 3, 7 => 1, 8 => 1
                    ]);
                    $place_faker = new PlaceFaker();
                    $crime_faker = new CriminalRecordFaker();
                    for ($i = 0; $i < $n_crimes; ++$i) {
                        factory(Crime::class)
                            ->states('wanted')
                            ->create([
                                'person_id' => $person->id,
                                'state_id' => $person->place->state->id,
                                'city' => $place_faker->usa_city($person->place->state->id),
                                'date' => $crime_faker->crime_date($person->age)
                            ]);
                    }
                    factory(PrisonerRecord::class)
                        ->state($n_crimes.'_crimes')
                        ->create(['person_id' => $person->id]);
            });
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