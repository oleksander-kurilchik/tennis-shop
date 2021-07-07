<?php

namespace TrekSt\Modules\ProductsVariations\Http\Controllers\Admin;

use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\Products\Models\Product;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\ProductsVariations\Http\Requests\ProductsVariationsGroupsStoreRequest;
use TrekSt\Modules\ProductsVariations\Http\Requests\ProductsVariationsGroupsUpdateRequest;
use TrekSt\Modules\ProductsVariations\Repositories\Admin\ProductsVariationsGroupsRepository;
use Session;
class ProductsVariationsGroupsController extends AdminBaseController
{
    protected $groupRepository;

    public function __construct()
    {
        parent::__construct();
        $this->groupRepository = new ProductsVariationsGroupsRepository();

    }


    public function index($products_id, Request $request)
    {
        $product = Product::findOrFail($products_id);
        $groups = $this->groupRepository->getGroupsForProduct($products_id);
        return $this->view('admin.products_variations.groups.index', compact('product', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($products_id)
    {
        $this->setCurrentBreadcrumbs('admin.products_variations.groups.create');
        $languages = Language::all();
        $product = Product::findOrFail($products_id);
        return $this->view('admin.products_variations.groups.create', compact('languages', 'product'));
    }


    public function store($products_id, ProductsVariationsGroupsStoreRequest $request)
    {
        $product = Product::findOrFail($products_id);

        $requestData = $request->validated();
        $requestData['products_id'] = $products_id;
        $group = $this->groupRepository->create($requestData);

        Session::flash('flash_message', 'Група створена!');

        if ($request->ajax()) {
            return ["success" => true];
        }

        return redirect(route('admin.products_variations.groups.edit', ['id' => $group->id]));
    }



//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     *
//     * @return \Illuminate\View\View
//     */
    public function edit($id)
    {

        $group = $this->groupRepository->getForEdit($id);
        $languages = Language::all();
        $product = Product::findOrFail($group->products_id);
        $this->setCurrentBreadcrumbs('admin.products_variations.group.edit', $group);
        return $this->view('admin.products_variations.groups.edit', compact('group', 'product', 'languages'));
    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  int  $id
//     * @param \Illuminate\Http\Request $request
//     *
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
    public function update($id, ProductsVariationsGroupsStoreRequest $request)
    {
        $group = $this->groupRepository->updateById($id, $request->validated());
        Session::flash('flash_message', 'Група оновлена!');
        if ($request->ajax()) {
            return ["success" => true];
        }
        return redirect(route('admin.products_variations.groups.edit', ['id' => $group->id]));
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     *
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
    public function destroy($id)
    {
        $group = $this->groupRepository->deleteById($id);
        Session::flash('flash_message', 'Групу видалено!');
        return back();
    }


}
