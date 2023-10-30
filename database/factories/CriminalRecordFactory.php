<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Records\CriminalRecord;
use App\Faker\CriminalRecordFaker;
use Faker\Generator as Faker;

for($n_crimes = 1; $n_crimes <= 3; ++$n_crimes) {
    $factory->state(CriminalRecord::class, $n_crimes.'_crimes', function (Faker $faker) use ($n_crimes) {
        $faker = new CriminalRecordFaker();
        return $faker->criminalRecord($n_crimes);
    });
}

$factory->define(CriminalRecord::class, function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->criminalRecord(1);
});
