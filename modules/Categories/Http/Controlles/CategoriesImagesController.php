<?php

namespace TrekSt\Modules\Categories\Http\Controllers;


use Cache;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TrekSt\Modules\Categories\Http\Requests\CategoriesImageCreateRequest;
use TrekSt\Modules\Categories\Models\CategoriesImage;
use TrekSt\Modules\Categories\Repositories\Admin\CategoriesImagesRepository;
use TrekSt\Modules\Categories\Services\CategoriesImageService;

class CategoriesImagesController extends Controller
{

    public function __construct()
    {
        $this->imageService = new CategoriesImageService();
        $this->imageRepository = new CategoriesImagesRepository();
        $this->middleware('permission:categories.edit')->only(['store','destroy', 'setLogo' ]);

    }


    public function store(CategoriesImageCreateRequest $request)
    {
        $images = $request->file("images");
        foreach ($images as $key =>  $img)
        {
            $this->imageService->setImageNumber($key);
            $imageName = $this->imageService->create($img);
            $image = $this->imageRepository->create([
                'image_name' => $imageName, 'categories_id' => $request->categories_id
            ]);

            $debug = 0;
        }

        Session::flash('flash_message', 'Зображення категории додано!');
        return back();
    }

    public function destroy($id)
    {
        $image = $this->imageRepository->deleteById($id);
        $this->imageService->deleteImage($image->image_name);
        Session::flash('flash_message', 'Зображення категории видалено!');
        return $this->back();

    }

    public function setLogo($id)
    {
        $this->imageRepository->setAsLogo($id);
        Session::flash('flash_message', 'Лого категории зміненно!');
        return $this->back();
    }


    protected function back()
    {
        $back = back();
        $back->setTargetUrl($back->getTargetUrl() . "#tab_block_images");
        return $back;
    }
}
