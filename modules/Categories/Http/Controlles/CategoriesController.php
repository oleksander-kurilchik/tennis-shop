<?php

namespace TrekSt\Modules\Categories\Http\Controllers;

use App\Http\Requests;
use TrekSt\Modules\Categories\Models\CategoriesImage;
use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Categories\Repositories\Admin\CategoriesImagesRepository;
use TrekSt\Modules\Categories\Repositories\Admin\CategoriesRepository;
use TrekSt\Modules\Categories\Services\CategoriesImageService;
use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\Products\Models\Product;
use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\Categories\Http\Requests\CategoriesStoreRequest;
use Validator;
use Cache;
use DB;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class CategoriesController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->categoriesRepository = new CategoriesRepository( );

        $this->imageService = new CategoriesImageService();
        $this->imageRepository = new CategoriesImagesRepository();



        $this->middleware('permission:categories.index')->only(['update']);
        $this->middleware('permission:categories.create')->only(['create','store']);
        $this->middleware('permission:categories.edit')->only(['edit','update','order' ,'editCategoriesHierarchy' , 'updateCategoriesHierarchy']);
        $this->middleware('permission:categories.delete')->only(['destroy']);


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $categories = $this->categoriesRepository->paginateIndex($keyword);
        $this->setCurrentBreadcrumbs('admin.categories.index');
        return $this->view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.categories.create');
        $categoryList = $this->categoriesRepository->getLevelList();
        return $this->view('admin.categories.create', compact('categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoriesStoreRequest $request)
    {

        $requestData = $request->all();
        $category = $this->categoriesRepository->create($requestData);
        $this->categoriesRepository->fixNestedTree();
        Session::flash('flash_message', 'Категорию створено!');
        Cache::flush();
        return redirect(route("admin.categories.edit", ["id" => $category->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = $this->categoriesRepository->get($id);
        $categoryImages = $category->images()->get();
        $this->setCurrentBreadcrumbs('admin.categories.show', $category);
        return $this->view('admin.categories.show', compact('category', 'categoryImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoriesRepository->getForEdit($id);
        $categoryList = $this->categoriesRepository->getLevelList();
        $this->setCurrentBreadcrumbs('admin.categories.edit', $category);
        return $this->view('admin.categories.edit', compact('category', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CategoriesStoreRequest $request)
    {

        $requestData = $request->all();
        $category = $this->categoriesRepository->updateById($id,$requestData);
        $this->categoriesRepository->fixNestedTree();
        Session::flash('flash_message', 'Категорія оновлена!');
        Cache::flush();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $category = $this->categoriesRepository->get($id);
        if ($category->hasChild()) {
            Session::flash('flash_warning', 'Не можливо видалити категорїю в якої є підкаткгорії');
            return back();
        }
        if ($category->hasProduct()) {
            Session::flash('flash_warning', 'Не можливо видалити категорїю в якої є товари');
            return back();
        }


        $images = $this->imageRepository->getAllForCategory($category->id);
        foreach ($images as $image){
            $this->imageService->deleteImage($image->image_name);
            $images = $this->imageRepository->deleteById($image->id);
        }

        $category = $this->categoriesRepository->deleteById($id);
        Session::flash('flash_message', 'Категорія видалена!');
        Cache::flush();
        return redirect(route("admin.categories.index"));
    }


    public function order($id, Request $request)
    {
        $this->validate($request, ["order" => ["required", "integer"]]);
        $category = Category::findOrFail($id);
        $category->update(["order" => $request->order]);
        Cache::flush();
        return back();
    }

    public function editCategoriesHierarchy(){

        //admin.categories.edit-categories-hierarchy
        $this->setCurrentBreadcrumbs('admin.categories.edit-categories-hierarchy');
        $categories = $this->categoriesRepository->getForEditHierarchy();
        return $this->view('admin.categories.categories_hierarchy', compact('categories'));


    }


    public function updateCategoriesHierarchy(Request $request){
        $data = $request->all();
        $menuItemOrder = $request->input('order');
        $this->categoriesRepository->updateHierarchy($menuItemOrder);
        if ($request->ajax()) {
            return ['success' => true, 'message' => "Новий порядок збережено" ];
        }
        \Cache::flush();
        return back();

    }





}
