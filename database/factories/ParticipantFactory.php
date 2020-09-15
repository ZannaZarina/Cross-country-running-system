<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'number' => $faker->numberBetween(1, 9999),
        'age_group' => $faker->randomElement([
            'S 3', 'V 3', 'S 5', 'V 5',
            'S 7', 'V 7', 'S 9', 'V 9',
            'S 10', 'V 10', 'S 12', 'V 12', 'S 14', 'V 14', 'S 16', 'V 16',
            'S 18', 'V 18', 'S 20', 'V 20', 'S 21', 'V 21', 'S 35', 'V 35',
            'S 40', 'V 40', 'S 55', 'V 55', 'S 60', 'V 60', 'S 65', 'V 65',
            'S 70', 'V 70', 'S 75', 'V 75',
            'S 80', 'V 80'
        ]) ,
    ];
});

