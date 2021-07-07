<?php

namespace TrekSt\Modules\Products\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Models\ProductsImage;
use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\Products\Http\Requests\ProductsImageCreateRequest;
use TrekSt\Modules\Products\Repositories\Admin\ProductsImagesRepository;
use TrekSt\Modules\Products\Services\ProductsImageService;


class ProductsImagesController extends Controller
{
    public function __construct()
    {

        $this->imageService = new ProductsImageService();
        $this->imageRepository = new ProductsImagesRepository();
        $this->middleware('permission:products.edit')
            ->only(['store','destroy','setLogo','order','rebuildImages']);

    }

    public function store(ProductsImageCreateRequest $request)
    {
//        $this->imageService->setImageNumber($key);
//        $products = Product::findOrFail($request->products_id);
//        ProductsImage::createImage($request->file('image'), $products->id);

        $images = $request->file("images");
        foreach ($images as $key =>  $img)
        {
            $this->imageService->setImageNumber($key);
            $imageName = $this->imageService->create($img);
            $image = $this->imageRepository->create([
                'image_name' => $imageName, 'products_id' => $request->products_id
            ]);

            $debug = 0;
        }

        Session::flash('flash_message', 'Зображення товару додано!');

        return $this->back();
    }

    public function destroy($id)
    {
        $image = $this->imageRepository->deleteById($id);
        $this->imageService->deleteImage($image->image_name);
        Session::flash('flash_message', 'Зображення товару видалено!');
        return $this->back();

    }

    public function setLogo($id)
    {
        $this->imageRepository->setAsLogo($id);
        Session::flash('flash_message', 'Лого товару зміненно!');
        return $this->back();

    }

    public function order($id, Request $request)
    {
        $this->validate($request, [
            'order' => 'required|integer',
        ]);
        $this->imageRepository->updateOrderById($id,$request->order );
        return $this->back();

    }

    protected function back()
    {
        $back = back();
        $back->setTargetUrl($back->getTargetUrl() . "#tab_block_images");
        return $back;
    }

    public function rebuildImages($id)
    {
        $images =  $this->imageRepository->allByProduct($id);
        foreach ($images as $image) {
            $this->imageService->rebuildImage($image);
         }
        Session::flash('flash_message', 'Всі зображеня товару оновлено!');
        return $this->back();
    }
}
