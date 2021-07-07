<?php

namespace TrekSt\Modules\ProductsAttributes\Http\Controllers\Admin;

use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\ProductsAttributes\Http\Requests\ProductsAttributePivotStoreRequest;
use TrekSt\Modules\ProductsAttributes\Http\Requests\ProductsAttributePivotUpdateRequest;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use \Session;
use TrekSt\Modules\ProductsAttributes\Repositories\Admin\ProductsAttributesPivotRepository;

class ProductsAttributesPivotController extends AdminBaseController
{
    protected $attributesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->pivotRepository = new ProductsAttributesPivotRepository();
    }


    public function index($products_id, Request $request)
    {
        $product = Product::findOrFail($products_id);
        $groupSelect = $this->pivotRepository->getAttributesForSelect();
        $values = $this->pivotRepository->getListValues($products_id);
        $languages = Language::all();
        return $this->view('admin.products_attributes.pivot.index',
            compact('product', 'languages', 'groupSelect', 'values'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($products_id, ProductsAttributePivotStoreRequest $request)
    {

        $requestData = $request->validated();
        $attribute = $this->pivotRepository->create($requestData);

        Session::flash('flash_message', 'Значення створено!');
        return redirect(route('admin.products_attributes.pivot.index', ['products_id' => $products_id]));
    }


    public function update($id, ProductsAttributePivotUpdateRequest $request)
    {
        $value = $this->pivotRepository->updateById($id, $request->validated());
        Session::flash('flash_message', 'Значення оновлено!');
        return redirect(route('admin.products_attributes.pivot.index', ['products_id' => $value->product_id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $value = $this->pivotRepository->deleteById($id);
        Session::flash('flash_message', 'Значення видалено!');
        return redirect(route('admin.products_attributes.pivot.index', ['products_id' => $value->product_id]));
    }


}
