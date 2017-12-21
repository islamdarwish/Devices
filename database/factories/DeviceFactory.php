<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Device::class, function (Faker $faker) {
    return [
        'id' => $faker->unixTime(),
        'name' => $faker->sentence($nbWords = 2),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
