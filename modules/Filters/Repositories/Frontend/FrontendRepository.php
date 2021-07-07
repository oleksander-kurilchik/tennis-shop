<?php


namespace TrekSt\Modules\Filters\Repositories\Frontend;


use TrekSt\Modules\Filters\Models\Filter;
use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Products\Models\Product;

class FrontendFiltersRepository
{
    public function __construct()
    {
        $this->filterModel = new Filter();
        $this->filterValueModel = new FiltersValue();
        $this->productModel = new Product();
    }

    public function getAvailableFiltersForCaterory($categories_id){

        $availFV = $this->filterValueModel->newQuery()->whereIn('id', function ($query) use ($categories_id) {
            $query->select('products_filter.filters_values_id')->from('products_filter')
                ->join('products', 'products.id', '=', 'products_filter.products_id')
                ->where('products.published',true)
                ->whereIn('products.categories_id',
                    function ($queryCat) use ($categories_id) {
                    /**  */
                        $queryCat->select(['categories.id'])->from('categories')->
                        join( 'categories as c1',function ($join){
                            $join->on('categories._lft', '>=', 'c1._lft');
                            $join->on('categories._lft', '<=', 'c1._rgt');

                        } )
                        ->where('c1.id',$categories_id);
                    });
        })->get()->pluck('id');


        $filters = $this->filterModel->newQuery()->whereHas('values', function ($query) use ($availFV) {
            $query->whereIn('id', $availFV);
        })->get();
        $filters->load([
            'values' => function ($query) use ($availFV) {
                $query->whereIn('id', $availFV)->orderBy('order');
            }, 'values.trans', 'trans'
        ]);


        return $filters;


/**
SELECT categories.id FROM `categories`
INNER JOIN categories c1 on (categories._lft >= c1._lft and categories._lft <= c1._rgt ) WHERE c1.id = 2

 */

    }


}
