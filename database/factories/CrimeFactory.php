<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Records\Crime;
use App\Faker\CriminalRecordFaker;
use Faker\Generator as Faker;

$factory->state(Crime::class, 'wanted', function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->crime('wanted');
});

$factory->state(Crime::class, 'prisoner', function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->crime('prisoner');
});

$factory->define(Crime::class, function (Faker $faker) {
    $faker = new CriminalRecordFaker();
    return $faker->crime();
});
