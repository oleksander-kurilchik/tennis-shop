<?php

use Illuminate\Database\Seeder;
use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroup;
use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroupsItem;
class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = \TrekSt\Modules\Products\Models\Product::all();
        foreach ($products as $product){
            $groupsRaw = factory(ProductsVariationsGroup::class, rand(1,5))->raw();
            foreach ($groupsRaw as $groupsRawOrder => $groupRaw){
                $groupRaw['products_id'] = $product->id;
                $group = ProductsVariationsGroup::query()->create($groupRaw);
                $groupsItemsRaw = factory(ProductsVariationsGroupsItem::class, rand(2,6))->raw();
                foreach ($groupsItemsRaw as $groupsItemRawOrder => $groupsItemRaw ){
                    if($groupsItemRawOrder == 0){$groupsItemRaw['products_id']=$product->id;}
                    $groupsItemRaw['groups_id'] = $group->id;
                    ProductsVariationsGroupsItem::query()->create($groupsItemRaw);

                }


            }
        }




    }
}
