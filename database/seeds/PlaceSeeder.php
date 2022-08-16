<?php

use Illuminate\Database\Seeder;
use App\Faker\Data\PlacesData;

class PlaceSeeder extends Seeder
{
    private function seed_offices()
    {
        $offices = PlacesData::offices();
        foreach ($offices as $id => $value) {
            DB::table('places')->insert([
                'id' => $id,
                'type' => 'office',
                'name' => $value['name'],
                'state_id' => $value['state_id']
            ]);
        }
    }

    private function seed_prisons()
    {
        $prisons = PlacesData::prisons();
        foreach ($prisons as $id => $value) {
            DB::table('places')->insert([
                'id' => $id,
                'type' => 'prison',
                'name' => $value['name'],
                'state_id' => $value['state_id'],
                'security_level' => $value['security_level']
            ]);
        }
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_offices();
        $this->seed_prisons();
    }
}
