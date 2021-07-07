<?php

namespace TrekSt\Modules\Filters\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use TrekSt\Modules\Categories\Repositories\Admin\CategoriesRepository;
use TrekSt\Modules\Filters\Models\Filter;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Filters\Http\Requests\FilterStoreRequest;
 use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Filters\Models\FiltersTranslating;
use TrekSt\Modules\Filters\Repositories\Admin\FiltersRepository;
use TrekSt\Modules\Languages\Models\Language;


class FiltersController extends AdminBaseController
{
//    use FilterBreadcrumbs;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        parent::__construct();
//        $this->filtersBreadcrumbs();
        $this->filterRepository = new FiltersRepository();
        $this->categoriesRepository = new CategoriesRepository();


        $this->middleware('permission:filters.index')->only(['index']);
        $this->middleware('permission:filters.show')->only(['show']);
        $this->middleware('permission:filters.edit')->only(['edit','update','order']);
        $this->middleware('permission:filters.create')->only(['create','store']);
        $this->middleware('permission:filters.delete')->only(['destroy']);




    }

    public function index(Request $request)
    {
        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        if (!empty($request->category)) {
            $queryArray['categories_id'] = $request->category;
        }

        $categories = $this->categoriesRepository->getLevelList();
        $filters = $this->filterRepository->paginateIndex($queryArray);

        $this->setCurrentBreadcrumbs('admin.filters.index');
        return $this->view('admin.filters.index', compact('filters', "categories"));
    }

    public function create()
    {

        $categories = $this->categoriesRepository->getLevelList();
        $this->setCurrentBreadcrumbs('admin.filters.create');
        return $this->view('admin.filters.create', compact("categories"));
    }

    public function store(FilterStoreRequest $request)
    {

        $requestData = $request->validated();
//        $filter = Filter::create($requestData);
        $filter = $this->filterRepository->create($requestData);
        Session::flash('flash_message', 'Фільтр створений!');
        return redirect(route("admin.filters.edit", ["id" => $filter->id]));
    }

    public function show($id)
    {
        $filter = $this->filterRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.filters.show', $filter);
        return $this->view('admin.filters.show', compact('filter'));
    }

    public function edit($id)
    {
        $filter = $this->filterRepository->getForEdit($id);
        $categories = $this->categoriesRepository->getLevelList();
        $this->setCurrentBreadcrumbs('admin.filters.edit', $filter);
        return $this->view('admin.filters.edit', compact('categories', 'filter'));
    }


    public function update($id, FilterStoreRequest $request)
    {
        $requestData = $request->validated();
        $filter = $this->filterRepository->updateById($id,$requestData);
        Session::flash('flash_message', 'Фільтр оновлений!');
        return redirect(route("admin.filters.edit", ["id" => $filter->id]));
    }


    public function destroy($id)
    {

        $this->filterRepository->deleteById($id);


        Session::flash('flash_message', 'Фільтр видалено!');
        return redirect(route("admin.filters.index"));
    }

    public function order($id, Request $request)
    {
        $this->validate($request, ["order" => ["required", "integer"]]);
        $this->filterRepository->updateOrderById($id,$request->order );

        if ($request->ajax()) {
            return ["success" => true, "message" => "Сортування змінено на " . $request->order];
        }
        return back();
    }
}
