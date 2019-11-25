<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Missing_part::class, function (Faker $faker) {
    return [
        'partno' => $faker->word,
        'qty' => $faker->numberBetween(1,99),
        'comment' => $faker->sentence,
        'is_found' => $faker->boolean
    ];
});
