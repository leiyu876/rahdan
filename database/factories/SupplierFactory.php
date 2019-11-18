<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Supplier::class, function (Faker $faker) {
    return [
        'code' => $faker->randomNumber(3),
        'name' => $faker->name,
        'type' => $faker->randomElement($array = array('credit', 'cash', 'cash or credit'))
    ];
});
