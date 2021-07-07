<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use TrekSt\Modules\Products\Models\ProductsImage;
use Faker\Generator as Faker;

$factory->define(ProductsImage::class, function (Faker $faker) {
    $path = public_path('images/factory/products');
    $files = collect(\File::allFiles($path));
    $file = $files->random();
    $debug = 0 ;
    return[
        'file'=>$file
    ];
});
