<?php


namespace TrekSt\Modules\Products\Repositories\Admin;


use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Models\ProductsImage;

class ProductsImagesRepository
{
    protected $imageModel;

    public function __construct()
    {

        $this->imageModel = new ProductsImage;

    }

    public function create($data)
    {

        $imageModel = $this->imageModel->newInstance($data);
        $imageModel->save();
        return $imageModel;

    }
    public function updateOrderById($id,$order)
    {
        $imageModel = $this->imageModel->newQuery()->findOrFail($id);
        $imageModel->order = $order;
        $imageModel->save();
        return $imageModel;
    }

    public function deleteById($id)
    {
        $imageModel = $this->imageModel->newQuery()->findOrFail($id);
        $imageModel->delete();
        return $imageModel;
    }
    public function allByProduct($products_id){
      return $this->imageModel->newQuery()->where('products_id',$products_id)->get();
    }


    public function setAsLogo($id)
    {
        $images = $this->imageModel->newQuery()->findOrFail($id);
        $this->imageModel->newQuery()->where('products_id', $images->products_id)->update(['logo_status' => false]);
        $images->update(['logo_status' => true]);
        return $images;
    }
}
