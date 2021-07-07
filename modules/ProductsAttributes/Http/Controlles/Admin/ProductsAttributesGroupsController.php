<?php
namespace TrekSt\Modules\ProductsAttributes\Http\Controllers\Admin;

 use TrekSt\Modules\Languages\Models\Language;
 use TrekSt\Modules\ProductsAttributes\Http\Requests\ProductsAttributesGroupsStoreRequest;
 use TrekSt\Modules\ProductsAttributes\Repositories\Admin\ProductsAttributesGroupsRepository;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use \Session;

class ProductsAttributesGroupsController extends  AdminBaseController
{
    protected $groupRepository;
    public function __construct()
    {
        parent::__construct();
        $this->groupRepository = new ProductsAttributesGroupsRepository( );

    }




    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $groups = $this->groupRepository->paginateIndex($keyword);
        $this->setCurrentBreadcrumbs('admin.products_attributes.groups.index');
        return $this->view('admin.products_attributes.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.products_attributes.groups.create');
        $languages = Language::all();
        return $this->view('admin.products_attributes.groups.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductsAttributesGroupsStoreRequest $request)
    {

        $requestData = $request->validated();
        $group = $this->groupRepository->create($requestData);

        Session::flash('flash_message', 'Група створена!');
        return redirect(route('admin.products_attributes.groups.edit',['id'=>$group->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
//    public function show($id)
//    {
//        $group = $this->groupRepository->getForShow($id);
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

        $group = $this->groupRepository->getForEdit($id);
        $languages = Language::all();
        $this->setCurrentBreadcrumbs('admin.products_attributes.edit',$group);
        return $this->view('admin.products_attributes.groups.edit', compact('group','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductsAttributesGroupsStoreRequest $request)
    {
        $group = $this->groupRepository->updateById($id,$request->validated());
        Session::flash('flash_message', 'Група оновлена!');
        return redirect(route('admin.products_attributes.groups.edit', ['id' => $group->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $group = $this->groupRepository->deleteById($id);
        Session::flash('flash_message', 'Групу видалено!');
        return redirect(route('admin.products_attributes.groups.index'));
    }




}
