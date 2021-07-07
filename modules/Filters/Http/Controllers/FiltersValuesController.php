<?php

namespace TrekSt\Modules\Filters\Http\Controllers;

use App\Http\Requests;
use Session;
use Breadcrumbs;
use Illuminate\Http\Request;
use TrekSt\Modules\Filters\Models\Filter;
use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Http\Requests\FiltersValueStoreRequest;
use TrekSt\Modules\Filters\Http\Controllers\Traits\FilterBreadcrumbs;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Filters\Models\FiltersTranslating;
use TrekSt\Modules\Filters\Models\FiltersValuesTranslating;
use TrekSt\Modules\Filters\Repositories\Admin\FiltersRepository;
use TrekSt\Modules\Filters\Repositories\Admin\FiltersValuesRepository;
use TrekSt\Modules\Languages\Models\Language;

class FiltersValuesController extends AdminBaseController
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


        $this->filterRepository = new FiltersRepository();
        $this->filterValuesRepository = new FiltersValuesRepository( );

        $this->middleware('permission:filters.index')->only(['index']);
        $this->middleware('permission:filters.show')->only(['show']);
        $this->middleware('permission:filters.edit')->only(['edit','update','order']);
        $this->middleware('permission:filters.create')->only(['create','store']);
        $this->middleware('permission:filters.delete')->only(['destroy']);
    }

    public function index($filters_id, Request $request)
    {

        $filter = $this->filterRepository->get($filters_id);
        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        $queryArray['filters_id'] = $filters_id;
        $filters_values = $this->filterValuesRepository->paginateIndex($queryArray);
        $this->setCurrentBreadcrumbs('admin.filters_values.index', $filter);
        return $this->view('admin.filters_values.index', compact('filters_values', 'filter'));
    }


    public function create($filters_id)
    {
        $filter = $this->filterRepository->get($filters_id);
        $this->setCurrentBreadcrumbs('admin.filters_values.create', $filter);
        return $this->view('admin.filters_values.create', compact('filter'));
    }

    public function store($filters_id, FiltersValueStoreRequest $request)
    {
        $filter = $this->filterRepository->get($filters_id);
        $filter_value = $this->filterValuesRepository->create($request->validated());
        Session::flash('flash_message', 'Значення фільтра додано!');
        return redirect(route('admin.filters_values.edit', ['filters_id' => $filters_id, 'id' => $filter_value->id]));
    }


    public function show($filters_id, $id)
    {
        $filter = $this->filterRepository->get($filters_id);
        $filters_value = $this->filterValuesRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.filters_values.show',$filters_value);
        return $this->view('admin.filters_values.show', compact('filters_value', 'filter'));

    }

    public function edit($filters_id, $id)
    {
        $filter = Filter::findOrFail($filters_id);
        $filters_value = FiltersValue::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.filters_values.edit',$filters_value);
        return $this->view('admin.filters_values.edit',  compact('filters_value', 'filter'));
    }


    public function update($filters_id, $id, FiltersValueStoreRequest $request)
    {
        $filter_value = $this->filterValuesRepository->updateById($id,$request->validated());
        Session::flash('flash_message', 'Значення фильтра оновлено!');
        return redirect(route('admin.filters_values.edit', ['filters_id' => $filters_id, 'id' => $filter_value->id]));
    }


    public function destroy($filters_id, $id)
    {
        $value = $this->filterValuesRepository->deleteById($id);
        Session::flash('flash_message', 'Значення фільтра видалено!');
        return redirect(route('admin.filters_values.index', ['filters_id' => $filters_id,]));
    }

    public function order($filters_id, $id, Request $request)
    {
        $this->validate($request, ['order' => ['required', 'integer']]);
        $this->filterValuesRepository->updateOrderById($id,$request->order );
        if ($request->ajax()) {
            return ['success' => true, 'message' => 'Сортування змінено на ' . $request->order];
        }
        return back();
    }
}
