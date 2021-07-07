<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

 use Faker\Generator as Faker;
 use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroup;
use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroupsItem;
$factory->define(ProductsVariationsGroup::class, function (Faker $faker) {
    return [
       'products_id'=>$faker->numberBetween(1,1000),
        'type'=>'tags',
        'name'=>$faker->sentence(1),
        'order'=>$faker->numberBetween(0,100),
        'published'=>$faker->boolean(80),
        'title'=>[
            'uk'=>$faker->sentence(1),
            'ru'=>$faker->sentence(1),
        ],
    ];
});


$factory->define(\TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroupsItem::class, function (Faker $faker) {
    return [
        'products_id'=>$faker->numberBetween(1,1000),
        'name'=>$faker->sentence(1),
//        'published'=>$faker->boolean(80),
        'order'=>$faker->numberBetween(0,100),
        'title'=>[
            'uk'=>$faker->sentence(1),
            'ru'=>$faker->sentence(1),
        ],
    ];
});
