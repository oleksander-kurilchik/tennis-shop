<?php

use Illuminate\Database\Seeder;
use TrekSt\Modules\Filters\Models\ProductsFilter;
use TrekSt\Modules\Filters\Models\FiltersValue;

class ProductFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = \TrekSt\Modules\Products\Models\Product::all();
        foreach ($products as $product){
            $arrayData = [];
            $filtersValues  =  FiltersValue::query()->inRandomOrder()->limit(6)->get();
            foreach ($filtersValues as $filtersValue){
                $arrayData [] = [
                    'products_id'=>$product->id,
                    'filters_values_id'=>$filtersValue->id,
                ];
            }
            ProductsFilter::query()->insert($arrayData);
        }
    }
}
