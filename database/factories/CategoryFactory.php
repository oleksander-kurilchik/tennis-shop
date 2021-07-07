<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use TrekSt\Modules\Categories\Models\CategoriesImage;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'slug' => $faker->unique()->slug(),
        'order' => 0,
        'published' => true,
     ];
});
