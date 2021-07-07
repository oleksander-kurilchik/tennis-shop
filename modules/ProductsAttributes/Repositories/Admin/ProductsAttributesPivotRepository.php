<?php


namespace TrekSt\Modules\ProductsAttributes\Repositories\Admin;


use TrekSt\Modules\ProductsAttributes\Models\ProductsAttributesGroup;
use TrekSt\Modules\ProductsAttributes\Models\ProductsProductAttributePivot;
use TrekSt\Modules\ProductsAttributes\Models\ProductsAttribute;

class ProductsAttributesPivotRepository
{


    /**
     * @param  null  $groupId
     */
    public function getValueForProduct($products_id): void
    {

    }

    /**
     * ProductsAttributesGroupsRepository constructor.
     * @param $model ProductsAttributes
     */
    public function __construct()
    {

        $this->pivotModel = new ProductsProductAttributePivot();
        $this->group = new ProductsAttributesGroup;
        $this->attribute = new ProductsAttribute();
    }

    public function getProductValue($products_id): void
    {

    }


    public function getForEdit(int $id)
    {
        return $this->model->findOrFail($id);
    }


    public function create($inputs)
    {
        $model = $this->pivotModel->fill($inputs);
        $model->save();
        return $model;
    }

    public function updateById($id, $inputs)
    {
        $model = $this->pivotModel->findOrFail($id);
        $model->update($inputs);
        return $model;
    }

    public function deleteById($id)
    {
        $model = $this->pivotModel->findOrFail($id);
        $model->delete();
        return $model;
    }
    public function getAttributesForSelect(){
        $groups = $this->group->with(['attributes'])->get();
       $selectArr = [];
       foreach ( $groups as $group){
           $items = [];
           foreach ($group->attributes as $attribute){
               $items[$attribute->id] = $attribute->name;
           }
           $selectArr[$group->name] = $items;
       }
        return $selectArr;


    }


    public function getListValues($products_id){

        $values = $this->pivotModel->select([
            'products_product_attributes_pivot.id as id',
            'products_product_attributes_pivot.order as order',
            'products_attributes_groups.name as group_name',
            'products_attributes.title as attribute_title',
            'products_product_attributes_pivot.value_text as value_text'
        ]) ->join('products', 'products_product_attributes_pivot.product_id', '=', 'products.id')
            ->join('products_attributes', 'products_product_attributes_pivot.product_attribute_id', '=', 'products_attributes.id')
            ->join('products_attributes_groups', 'products_attributes_groups.id', '=', 'products_attributes.group_id')
            ->where('products_product_attributes_pivot.product_id',$products_id)
//            ->orderBy('products_attributes_groups.order')
//            ->orderBy('products_attributes.order')
            ->orderBy('products_product_attributes_pivot.order')
            ->get();

       return $values;

    }


}
