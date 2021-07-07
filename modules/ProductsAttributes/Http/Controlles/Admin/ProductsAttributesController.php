<?php

namespace TrekSt\Modules\ProductsAttributes\Http\Controllers\Admin;

use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\ProductsAttributes\Http\Requests\ProductsAttributeStoreRequest;
 use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use \Session;
use TrekSt\Modules\ProductsAttributes\Repositories\Admin\ProductsAttributesGroupsRepository;
use TrekSt\Modules\ProductsAttributes\Repositories\Admin\ProductsAttributesRepository;

class ProductsAttributesController extends AdminBaseController
{
    protected $attributesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->attributesRepository = new ProductsAttributesRepository();
        $this->groupRepository = new ProductsAttributesGroupsRepository();


    }


    public function index($group_id, Request $request)
    {
        $keyword = $request->get('search');
        $this->attributesRepository->setGroupId($group_id);
        $group = $this->groupRepository->get($group_id);
        $attributes = $this->attributesRepository->paginateIndex($keyword);
        $this->setCurrentBreadcrumbs('admin.products_attributes.attributes.index');
        return $this->view('admin.products_attributes.attributes.index', compact('group', 'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($group_id)
    {
        $group = $this->groupRepository->get($group_id);
        $this->setCurrentBreadcrumbs('admin.products_attributes.attributes.create');
        $languages = Language::all();
        return $this->view('admin.products_attributes.attributes.create', compact('languages', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($group_id, ProductsAttributeStoreRequest $request)
    {
        $group = $this->groupRepository->get($group_id);
        $requestData = $request->validated();
        $attribute = $this->attributesRepository->create($requestData);

        Session::flash('flash_message', 'Атрибут створено!');
        return redirect(route('admin.products_attributes.attributes.edit', ['id' => $attribute->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
//     public function show($id)
//    {
//        $group = $this->attributesRepository->getForShow($id);
//        $languages = Language::all();
//        $this->setCurrentBreadcrumbs('admin.products.show',$group);
//        return $this->view('admin.products_attributes.groups.show', compact('group','languages'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $attribute = $this->attributesRepository->getForEdit($id);
        $group = $this->groupRepository->get($attribute->group_id);
        $languages = Language::all();
        $this->setCurrentBreadcrumbs('admin.products_attributes.attributes.edit', $group);
        return $this->view('admin.products_attributes.attributes.edit', compact('group', 'attribute', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductsAttributeStoreRequest $request)
    {
        $attribute = $this->attributesRepository->updateById($id, $request->validated());
        Session::flash('flash_message', 'Атрибут оновлено!');
        return redirect(route('admin.products_attributes.attributes.edit', ['id' => $attribute->id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $attribute = $this->attributesRepository->deleteById($id);
        Session::flash('flash_message', 'Аттрибут видалено!');
        return redirect(route('admin.products_attributes.attributes.index',['group_id'=>$attribute->id]));
    }


}
