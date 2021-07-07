<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProductsAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $attributes = \TrekSt\Modules\ProductsAttributes\Models\ProductsAttribute::all();
        $products = \TrekSt\Modules\Products\Models\Product::all();
        foreach ($products as $product){
            $productAttributeData= [];
            foreach ($attributes as $attribute){
                $rawProducts   = factory(\TrekSt\Modules\ProductsAttributes\Models\ProductsProductAttributePivot::class, 1)->raw();
                $productAttribute = [
                    'product_id'=>$product->id,
                    'product_attribute_id'=>$attribute->id,
                    'value_text'=>$rawProducts[0],
                ];
                \TrekSt\Modules\ProductsAttributes\Models\ProductsProductAttributePivot::query()->create($productAttribute);
            }
            echo "Product {$product->id} added \n";


        }

    }
}
