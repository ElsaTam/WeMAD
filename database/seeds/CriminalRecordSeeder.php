<?php

use Illuminate\Database\Seeder;
use App\Custom\Date;

class CriminalRecordSeeder extends Seeder
{
    private function seed_handmade()
    {
        include 'handmade/CriminalRecords.php';

        // Insert records
        DB::table('criminal_records')->insert($criminal_records);
    }

    private function seed_generated()
    {
        include 'generated/CriminalRecords.php';

        // Insert records
        DB::table('criminal_records')->insert($criminal_records);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_handmade();
        $this->seed_generated();
    }
}
