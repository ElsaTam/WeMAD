<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CriminalRecord;
use App\Faker\CriminalRecordFaker;
use Faker\Generator as Faker;

$factory->define(CriminalRecord::class, function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->criminalRecord();
});
