<?php


namespace TrekSt\Modules\Products\UrlPresenter;


use TrekSt\Modules\Products\Services\ProductsImageService as ImageService;

class ImageUrlPresenter
{
    protected $image;
    protected $disc;
    public function __construct($productImage)
    {
        $this->image = $productImage;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->$key;
    }


    public function path_0x()
    {
        return ImageService::getImagePath0X($this->image->image_name);
    }
    public function path_1x()
    {
        return ImageService::getImagePath1X($this->image->image_name);
    }

    public function path_2x()
    {
        return ImageService::getImagePath2X($this->image->image_name);
    }

    public function path_3x()
    {
        return ImageService::getImagePath3X($this->image->image_name);
    }
    public function path_1x_webp()
    {
        return ImageService::getImagePath1X($this->image->image_name).'.webp';
    }

    public function path_2x_webp()
    {
        return ImageService::getImagePath2X($this->image->image_name).'.webp';
    }

    public function path_3x_webp()
    {
        return ImageService::getImagePath3X($this->image->image_name).'.webp';
    }
    public function path_0x_webp()
    {
        return ImageService::getImagePath0X($this->image->image_name).'.webp';
    }
    public function path_original()
    {
        return ImageService::getOriginImagePath($this->image->image_name);
    }

    public function image_type(){
        $array = explode('.',$this->image->image_name);
         return end($array);
    }

}
