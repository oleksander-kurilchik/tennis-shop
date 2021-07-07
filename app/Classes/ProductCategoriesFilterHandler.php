<?php


namespace App\Classes;



use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Models\ProductsFilter;

class ProductCategoriesFilterHandler
{


    public   function handle($productsQuery , $subCategories ){

        $selectedCategories = $subCategories->where('checked',true);
        if($selectedCategories->isEmpty()){
            return;
        }

        $productsQuery->whereIn('products.categories_id',function ($query) use($selectedCategories) {
            $query->select(['cat_sub_filter.id'])->from('categories as cat_sub_filter');
            foreach ($selectedCategories as $selectedCategory){
                $query->orWhere(function ($query)use ($selectedCategory){
                    $query
                        ->where('cat_sub_filter._lft','>=',$selectedCategory->_lft)
                        ->where('cat_sub_filter._rgt','<=',$selectedCategory->_rgt);
                });


            }

        });


        return $productsQuery;

    }


}
