<?php

namespace TrekSt\Modules\LandingPages\Http\Controllers\Admin;

use Session;
use TrekSt\Modules\LandingPages\Models\LandingPageTranslating;
use TrekSt\Modules\News\Repositories\Admin\LandingPagesRepository;
use Validator;
use Illuminate\Http\Request;
use TrekSt\Modules\LandingPages\Models\LandingPage;
use TrekSt\Modules\LandingPages\Models\LandingPageImage;
use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\LandingPages\Http\Requests\LandingPageRequest;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class LandingPagesController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->landingPagesRepository = new LandingPagesRepository(new LandingPage(), new Language(), new LandingPageTranslating());




        $this->middleware('permission:pages.index')->only(['index']);
        $this->middleware('permission:pages.edit')->only(['edit','update']);
        $this->middleware('permission:pages.show')->only(['show']);
        $this->middleware('permission:pages.create')->only(['create','store']);
        $this->middleware('permission:pages.delete')->only(['delete']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.landing_pages.index');
        $keyword = $request->get('search');
        $landing_pages =   $this->landingPagesRepository->paginateIndex($keyword);
        return $this->view('admin.landing_pages.index', compact('landing_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.landing_pages.create');
        return $this->view('admin.landing_pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(LandingPageRequest $request)
    {
        $requestData = $request->all();
        $landing_page = $this->landingPagesRepository->create($requestData);
//
//        if (isset($requestData["image"])) {
//            $landing_page->addImage($request->file("image"));
//        }
        Session::flash('flash_message', 'Сторінку створено!');
        return redirect(route("admin.landing_pages.edit", ["id" => $landing_page->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
         $landing_page = $this->landingPagesRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.landing_pages.show',$landing_page);
        return $this->view('admin.landing_pages.show', compact('landing_page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $languages = Language::all();
        $landing_page = $this->landingPagesRepository->getForEdit($id);
        $this->setCurrentBreadcrumbs('admin.landing_pages.edit',$landing_page);
        return $this->view('admin.landing_pages.edit', compact('landing_page', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int                     $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, LandingPageRequest $request)
    {
        $requestData = $request->all();
        $news = $this->landingPagesRepository->updateById($id, $requestData);

        Session::flash('flash_message', 'Сторінку оновлено!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, Request $request)
    {
        $news = $this->landingPagesRepository->deleteById($id);

        Session::flash('flash_message', 'Сторінка видалена!');
        return redirect(route("admin.landing_pages.index"));
    }


}
