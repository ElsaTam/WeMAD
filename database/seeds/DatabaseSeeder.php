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
        DB::table('messages')->delete();
        DB::table('photos')->delete();
        DB::table('crimes')->delete();
        DB::table('criminal_records')->delete();
        DB::table('prisoner_records')->delete();
        DB::table('people')->delete();
        DB::table('organisations')->delete();
        DB::table('groups')->delete();
        DB::table('group_types')->delete();
        DB::table('places')->delete();
        DB::table('states')->delete();
        DB::table('countries')->delete();
        DB::table('country_organisation')->delete();

        srand(32);

        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(OrganisationSeeder::class);
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

        $n_wanteds = 10; // 10
        $n_missings = 5; // 5
        $n_prisoners = [
            'min' => 1, // 1
            'max' => 10 // 10
        ];
        $n_vampires = [
            'min' => 1, // 1
            'max' => 5, // 5
            'renegades' => 10, // 10
            'deads' => 40 // 40
        ];
        $pick_sires = True; // True
        $n_warlocks = [
            'min' => 1, // 1
            'max' => 5, // 5
            'renegades' => 10, // 10
            'deads' => 0 // 0
        ];
        $n_werewolves = [
            'min' => 1, // 1
            'max' => 5, // 5
            'renegades' => 10, // 10
            'deads' => 0 // 0
        ];
        $n_humans = 12; // 12
        $n_agents = [
            'min' => 1, // 2
            'max' => 5 // 5
        ];

        // Wanteds
        echo "Seeding Wanteds...";
        $time_start = microtime(true);
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
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        // Missings
        echo "Seeding Missings...";
        $time_start = microtime(true);
        factory(Person::class, $n_missings)
            ->make(['status' => 'missing'])
            ->each(function ($person) {
                $this->insert("people", $person);
            });
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";
            
        
        // Prisoners
        echo "Seeding Prisoners...";
        $time_start = microtime(true);
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
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        echo "Seeding Vampires...";
        $time_start = microtime(true);
        $this->random_type('vampire', 'clan', $n_vampires);
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        echo "Seeding Warlocks...";
        $time_start = microtime(true);
        $this->random_type('warlock', 'circle', $n_warlocks);
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        echo "Seeding Werewolves...";
        $time_start = microtime(true);
        $this->random_type('werewolf', 'pack', $n_werewolves);
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        // Create sires and breed
        echo "Seeding Sires...";
        $time_start = microtime(true);
        if ($pick_sires) {
            $vampires = DB::table("people")
                ->where('type', 'vampire')
                ->get();
            foreach ($vampires as $vampire) {
                $sire = $this->random_sire($vampires, $vampire);
                DB::table('people')->where('id', $vampire->id)->update(['sire_id' => $sire]);
            }
        }
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        // Humans
        echo "Seeding Humans...";
        $time_start = microtime(true);
        factory(Person::class, $n_humans)
            ->states('human')
            ->create();
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";

        // Agents
        echo "Seeding Agents...";
        $time_start = microtime(true);
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
        $execution_time = (microtime(true) - $time_start)/60;
        echo " done (".$execution_time.")\n";
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