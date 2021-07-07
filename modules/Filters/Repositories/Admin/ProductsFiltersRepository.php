<?php


namespace TrekSt\Modules\Filters\Repositories\Admin;


use TrekSt\Modules\Filters\Models\Filter;
use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Models\ProductsFilter;
use TrekSt\Modules\Products\Models\Product;

class ProductsFiltersRepository
{
    public function __construct()
    {
        /** @var $productsModel \Illuminate\Database\Eloquent\Model */
        $this->productsModel =  new Product();
        $this->filtersModel = new Filter();
        $this->filtersValuesModel =  new FiltersValue();
        /** @var $productFilterModel \Illuminate\Database\Eloquent\Model */
        $this->productFilterModel = new ProductsFilter();

    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }

    public function getProductById($id)
    {
        return $this->productsModel->newQuery()->where('id', $id)->firstOrFail();
    }


    public function getSelectedFiltersValuesIdForProduct($id)
    {
        return $this->productFilterModel->newQuery()->where('products_id', $id)->get()->pluck('filters_values_id')->toArray();
    }


    public function getAvailAbleFiltersForProduct($id)
    {
        $product = $this->productsModel->newQuery()->where(['id' => $id])->firstOrFail();

        return $this->filtersModel->newQuery()->where('categories_id', $product->categories_id)
            ->orWhere('categories_id', null)->with(['values'])->get();
    }


    public function setFilterForProduct($id, $filtersIds)
    {

        $this->productFilterModel->whereNotIn('filters_values_id', $filtersIds)->where('products_id', $id)->delete();
        foreach ($filtersIds as $value) {
            $this->productFilterModel->newQuery()->
            firstOrCreate(['products_id'=> $id,'filters_values_id' => $value]);

        }
    }


    public function deleteByFilterValue($filter_values_id){
        $this->productFilterModel->where('filters_values_id',$filter_values_id)->delete();
    }


}
