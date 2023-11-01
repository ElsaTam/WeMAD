<?php

use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include 'handmade/Organisations.php';
        $organisations_copy = $organisations;
        $pivot = [];
        foreach ($organisations_copy as $key => $organisation) {
            foreach ($organisation['countries'] as $country_id) {
                $pivot[] = [
                    'country_id' => $country_id,
                    'organisation_id' => $organisation['id']
                ];
            }
            unset($organisations_copy[$key]['countries']); // Will be updated once the leader has been inserted in wemad.people table
        }
        DB::table('organisations')->insert($organisations_copy);
        DB::table('country_organisation')->insert($pivot);
    }
}
