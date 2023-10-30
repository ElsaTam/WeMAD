<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Records\PrisonerRecord;
use App\Faker\CriminalRecordFaker;
use Faker\Generator as Faker;

for($n_crimes = 1; $n_crimes <= 10; ++$n_crimes) {
    $factory->state(PrisonerRecord::class, $n_crimes.'_crimes', function (Faker $faker) use ($n_crimes) {
        $faker = new CriminalRecordFaker();
        return $faker->prisonerRecord($n_crimes);
    });
}

$factory->define(PrisonerRecord::class, function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->prisonerRecord(1);
});