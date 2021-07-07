<?php


namespace TrekSt\Modules\ProductsVariations\Repositories\Frontend;


use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroup;
use TrekSt\Modules\ProductsVariations\Models\ProductsVariationsGroupsItem;

class ProductsVariationsGroupsRepository
{
    protected $model;
    protected $modelProduct;
    protected $perPage = 25;

    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsVariationsGroup
     */
    public function __construct()
    {
        $this->groupModel = new ProductsVariationsGroup();
        $this->modelItems = new ProductsVariationsGroupsItem();
    }



    public function getGroupsWithProducts($products_id)
    {
        $groupsCollection = collect();
        $lang = app()->getLocale();
        $groups = $this->groupModel->where('products_id',$products_id)->published()
            ->has('items')->whereHas('items.product',function ($query){
                $query->where('products.published', true)
                    ->whereNotExists(function ($query){
                        $query->select('*')
                            ->from('categories as c_p')
                            ->leftJoin('categories as c_pj', function($join)
                            {
                                $join->on('c_p._lft', '<=', 'c_pj._lft');
                                $join->on('c_p._rgt', '>=', 'c_pj._rgt');
                            })
                            ->whereColumn('c_pj.id', 'products.categories_id')
                            ->where('c_p.published', false);
                    });


            })
            ->get();
        $groups->load(['items.product'=>function($query){
            $query->where('products.published', true)
                ->whereNotExists(function ($query){
                    $query->select('*')
                        ->from('categories as c_p')
                        ->leftJoin('categories as c_pj', function($join)
                        {
                            $join->on('c_p._lft', '<=', 'c_pj._lft');
                            $join->on('c_p._rgt', '>=', 'c_pj._rgt');
                        })
                        ->whereColumn('c_pj.id', 'products.categories_id')
                        ->where('c_p.published', false);
                });
        }]);
        foreach ($groups as $group){
            $items = $group->items->filter(function ($value, $key){
               return   $value->product !=null;
            });
            $group->items = $items;

        }


        return $groups->filter(function($value, $key){
            return $value->items->count()>0;
        });


    }


}
