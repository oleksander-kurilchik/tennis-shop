<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductsAttributes;
use Faker\Generator as Faker;

$factory->define(\TrekSt\Modules\ProductsAttributes\Models\ProductsProductAttributePivot::class, function (Faker $faker) {
    return [
         'uk'=>$faker->sentence(3),'ru'=>$faker->sentence(3)

    ];
});
