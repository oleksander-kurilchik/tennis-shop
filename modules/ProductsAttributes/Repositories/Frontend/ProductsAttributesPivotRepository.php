<?php


namespace TrekSt\Modules\ProductsAttributes\Repositories\Frontend;



class ProductsAttributesPivotRepository
{




    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsAttributes
     */
    public function __construct($model )
    {
        $this->model = $model;
    }


    public function getListValues($products_id){

        $values = $this->model->select([
            'products_product_attributes_pivot.id as id',
            'products_product_attributes_pivot.order as order',
            'products_attributes.title as attribute_title',
            'products_product_attributes_pivot.value_text as value_text'
        ]) ->join('products', 'products_product_attributes_pivot.product_id', '=', 'products.id')
            ->join('products_attributes', 'products_product_attributes_pivot.product_attribute_id', '=', 'products_attributes.id')
            ->join('products_attributes_groups', 'products_attributes_groups.id', '=', 'products_attributes.group_id')
            ->where('products_product_attributes_pivot.product_id',$products_id)
            ->where('products_attributes.published',true)
            ->where('products_attributes_groups.published',true)
 //            ->orderBy('products_attributes_groups.order')
//            ->orderBy('products_attributes.order')
            ->orderBy('products_product_attributes_pivot.order')
            ->get();

        $values =$values ->each(function ($item, $key) {
            $item->translatable[] = 'attribute_title';
        });

       return $values;

    }


}
