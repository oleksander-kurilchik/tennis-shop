<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\TrekSt\Modules\Filters\Models\Filter::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(1),
        'order' => $faker->numberBetween(),
        'published' => $faker->boolean,
    ];
});
