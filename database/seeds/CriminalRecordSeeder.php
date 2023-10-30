<?php

use Illuminate\Database\Seeder;
use App\Custom\Date;

class CriminalRecordSeeder extends Seeder
{
    private function seed_handmade()
    {
        include 'handmade/Crimes.php';
        include 'handmade/CriminalRecords.php';
        include 'handmade/PrisonerRecords.php';

        // Insert records
        DB::table('crimes')->insert($crimes);
        DB::table('criminal_records')->insert($criminal_records);
        DB::table('prisoner_records')->insert($prisoner_records);
    }

    private function seed_generated()
    {
        include 'generated/Crimes.php';
        include 'generated/CriminalRecords.php';
        include 'generated/PrisonerRecords.php';

        // Insert records
        DB::table('crimes')->insert($crimes);
        DB::table('criminal_records')->insert($criminal_records);
        DB::table('prisoner_records')->insert($prisoner_records);
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
    }
}
