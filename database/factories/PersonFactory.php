<?php

use App\Models\People\Person;
use App\Faker\PersonFaker;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->state(Person::class, 'vampire', function (Faker $faker) {
    $faker = new PersonFaker();
    return $faker->person('vampire');
});

$factory->state(Person::class, 'warlock', function (Faker $faker) {
    $faker = new PersonFaker();
    return $faker->person('warlock');
});

$factory->state(Person::class, 'werewolf', function (Faker $faker) {
    $faker = new PersonFaker();
    return $faker->person('werewolf');
});

$factory->state(Person::class, 'human', function (Faker $faker) {
    $faker = new PersonFaker();
    return $faker->person('human');
});

$factory->define(Person::class, function (Faker $faker) {
    $faker = new PersonFaker();
    return $faker->person(NULL);
});