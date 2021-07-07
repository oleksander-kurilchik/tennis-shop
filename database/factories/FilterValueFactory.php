<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\TrekSt\Modules\Filters\Models\FiltersValue::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'filters_id' => $faker->numberBetween(1,30),
        'order' => $faker->numberBetween(),
        'published' => $faker->boolean,
    ];
});
