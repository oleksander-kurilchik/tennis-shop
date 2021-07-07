<?php

namespace TrekSt\Modules\MainSlider\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\MainSlider\Http\Requests\MainSliderRequest;
use TrekSt\Modules\MainSlider\Repositories\Admin\MainSliderRepository;
use TrekSt\Modules\MainSlider\Services\ImageService;
use TrekSt\Modules\MainSlider\Services\ImageSmallService;


class MainSliderController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->mainSliderRepository = new MainSliderRepository();
        $this->imageService = new ImageService();
        $this->imageSmallService = new ImageSmallService();

    }



    public function index(Request $request)
    {
        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        $mainslider = $this->mainSliderRepository->paginateIndex($queryArray) ;
        $this->setCurrentBreadcrumbs('admin.main-slider.index');
        return $this->view('admin.main-slider.index', compact('mainslider'));
    }


    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.main-slider.create');
        $languages = Language::all();
        return $this->view('admin.main-slider.create', compact('languages'));
    }


    public function store(MainSliderRequest $request)
    {
        /**
         * @var MainSlider $mainslider
         */


        $requestData = $request->validated();
        $mainslider = $this->mainSliderRepository->create($requestData);
        if (isset($requestData["image"])) {
            $imageName = $this->imageService->create($request->file('image'));
            $this->mainSliderRepository->setImage($imageName , $mainslider->id);
        }
        if (isset($requestData["image_sm"])) {
            $imageName = $this->imageSmallService->create($request->file('image_sm'));
            $this->mainSliderRepository->setSmallImage($imageName , $mainslider->id);
        }
        Session::flash('flash_message', 'Слайдер головної сторінки додано!');
        return redirect(route("admin.main-slider.edit", ['id' => $mainslider->id]));
    }


    public function show($id)
    {
        $mainslider = $this->mainSliderRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.main-slider.show', $mainslider);
        return $this->view('admin.main-slider.show', compact('mainslider'));
    }

    public function edit($id)
    {
        $mainslider = $this->mainSliderRepository->getForEdit($id);
        $languages = Language::all();
        $this->setCurrentBreadcrumbs('admin.main-slider.edit', $mainslider);
        return $this->view('admin.main-slider.edit', compact('mainslider', "languages"));
    }


    public function update($id, MainSliderRequest $request)
    {

        $requestData = $request->validated();
        $mainslider = $this->mainSliderRepository->updateById($id,$requestData);

        if (isset($requestData["image"])) {
             $this->imageService->deleteImage($mainslider->image_name);
            $imageName = $this->imageService->create($request->file('image'));
            $this->mainSliderRepository->setImage($imageName , $mainslider->id);
        }
        if (isset($requestData["image_sm"])) {
            $this->imageSmallService->deleteImage($mainslider->image_name_sm);
            $imageName = $this->imageSmallService->create($request->file('image_sm'));
            $this->mainSliderRepository->setSmallImage($imageName , $mainslider->id);
        }

        Session::flash('flash_message', 'Слайдер головної сторінки оновлено!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse','\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $mainslider =  $this->mainSliderRepository->deleteById($id);
        $this->imageSmallService->deleteImage($mainslider->image_name_sm);
        $this->imageService->deleteImage($mainslider->image_name);
        Session::flash('flash_message', 'Слайдер головної сторінки видалено!');
        return redirect(route("admin.main-slider.index"));
    }

    public function order($id, Request $request)
    {
        $this->validate($request, [
            'order' => ['required', 'integer'],
        ]);
        $mainslider =  $this->mainSliderRepository->updateOrderById($id, $request->order);
        return back();
    }


}
