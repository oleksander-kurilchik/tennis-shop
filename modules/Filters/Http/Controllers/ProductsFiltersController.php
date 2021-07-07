<?php

namespace TrekSt\Modules\Filters\Http\Controllers;

use TrekSt\Modules\Filters\Models\Filter;
use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Repositories\Admin\ProductsFiltersRepository;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Filters\Models\ProductsFilter;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use Session;

class ProductsFiltersController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->productsFiltersRepository = new ProductsFiltersRepository();

         $this->middleware('permission:products.edit')->only(['index','update']);


    }


    public function index($products_id)
    {

        $product = $this->productsFiltersRepository->getProductById($products_id);
        $filters_values_arr = $this->productsFiltersRepository->getSelectedFiltersValuesIdForProduct($products_id);
        $filters =  $this->productsFiltersRepository->getAvailAbleFiltersForProduct($products_id);
        $this->setCurrentBreadcrumbs('admin.products_filters.index',$product);
        return $this->view('admin.products_filters.index',compact('filters_values_arr','filters','product'));

    }


    public function update(Request $request, $products_id)
    {
        $rules =[
                'filters_values' => ['array'],
                'filters_values.*'=>['integer','exists:filters_values,id']
            ];
        if ($request->filters_values == null)
        {
            $request->filters_values = [];
        }
        $this->validate($request,$rules);
        $product =  $this->productsFiltersRepository->getProductById($products_id);
        $this->productsFiltersRepository->setFilterForProduct($products_id,$request->filters_values );
        Session::flash('flash_message', 'Фільтри оновлені!');
        return redirect(route('admin.products_filters.index',['products_id'=>$product->id]));


    }


}
