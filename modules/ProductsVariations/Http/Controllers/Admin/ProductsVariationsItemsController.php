<?php

namespace TrekSt\Modules\ProductsVariations\Http\Controllers\Admin;

 use TrekSt\Modules\Languages\Models\Language;
 use TrekSt\Modules\Products\Models\Product;
 use TrekSt\Modules\ProductsVariations\Repositories\Admin\ProductsVariationsGroupsRepository;
use TrekSt\Modules\ProductsVariations\Repositories\Admin\ProductsVariationsItemsRepository;
 use TrekSt\Modules\ProductsVariations\Http\Requests\ProductsVariationsItemStoreRequest;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use \Session;
use TrekSt\Modules\ProductsVariations\Http\Requests\ProductsVariationsItemUpdateRequest;

class ProductsVariationsItemsController extends AdminBaseController
{
    protected $attributesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->itemsRepository = new ProductsVariationsItemsRepository();
        $this->groupRepository = new ProductsVariationsGroupsRepository();
    }




    public function index($group_id, Request $request)
    {
//        $keyword = $request->get('search');
        $group = $this->groupRepository->getForEdit($group_id);
        $items = $this->itemsRepository->getForIndex($group_id);
        $this->setCurrentBreadcrumbs('admin.products_variations.attributes.index');
        return $this->view('admin.products_variations.items.index', compact('group', 'items'));
    }

    public function create($group_id)
    {
        $group = $this->groupRepository->getForEdit($group_id);
        $this->setCurrentBreadcrumbs('admin.products_variations.items.create');
        $languages = Language::all();
        return $this->view('admin.products_variations.items.create', compact('languages', 'group'));
    }



    public function store($group_id,ProductsVariationsItemStoreRequest $request)
    {
         $group = $this->groupRepository->getForEdit($group_id);
         $requestData = $request->validated();
        $requestData['groups_id'] = $group_id;
        $item = $this->itemsRepository->create($requestData);
         Session::flash('flash_message', 'Елемент варианта створено!');
         return redirect(route('admin.products_variations.items.edit',['id'=>$item->id]));
     }

    public function edit($id)
    {
        $item = $this->itemsRepository->getForEdit($id);
        $group = $this->groupRepository->getForEdit($item->groups_id);
        $selectedProduct = Product::findOrFail($item->products_id);
        $languages = Language::all();
//        $this->setCurrentBreadcrumbs('admin.products_attributes.attributes.edit', $group);
        return $this->view('admin.products_variations.items.edit', compact('item','group','languages','selectedProduct'));
    }


    public function update($id, ProductsVariationsItemStoreRequest $request)
    {
        $requestData = $request->validated();
        $item = $this->itemsRepository->updateById($id,$requestData);
        Session::flash('flash_message', 'Елемент варианта  оновлено!');
        return redirect(route('admin.products_variations.items.edit', ['id' => $item->id]));
    }


    public function destroy($id)
    {
        $item = $this->itemsRepository->deleteById($id);
        Session::flash('flash_message', 'Елемент варианту видалено!');
        return back();
    }


}
