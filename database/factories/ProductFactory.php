<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \TrekSt\Modules\Products\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'slug' => $faker->unique()->slug(),
        'vendor_code' => $faker->unique()->isbn10,
        'order' => 0,
        'currencies_id' => 1,
        'published' => $faker->boolean,
        'sale' => $faker->boolean,
        'new' => $faker->boolean,
        'top' => $faker->boolean,
        'price'=> $faker->randomNumber(3),
        'old_price'=> $faker->boolean?0:$faker->randomNumber(3),
        'categories_id'=> \DB::table('categories')->select('id')->whereNotNull('parent_id')->inRandomOrder()->first()->id,
    ];
});
