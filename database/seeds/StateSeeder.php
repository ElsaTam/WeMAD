<?php

use Illuminate\Database\Seeder;
use App\Faker\Data\PlacesData;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = PlacesData::states();
        foreach ($states as $id => $value) {
            DB::table('states')->insert([
                'id' => $id,
                'name' => $value['name'],
                'council' => $value['council']
            ]);
        }
    }
}
