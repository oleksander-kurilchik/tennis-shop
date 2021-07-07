<?php


namespace TrekSt\Modules\MainSlider\UrlPresenter;

use TrekSt\Modules\MainSlider\Services\ImageSmallService as ImageService;

class ImageSmallUrlPresenter
{
    protected $slider;
    protected $disc;
    public function __construct($slider)
    {
        $this->slider = $slider;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->$key;
    }


    public function path_1x()
    {
        return ImageService::getImagePath1X($this->slider->image_name_sm);
    }

    public function path_2x()
    {
        return ImageService::getImagePath2X($this->slider->image_name_sm);
    }

    public function path_3x()
    {
        return ImageService::getImagePath3X($this->slider->image_name_sm);
    }

    public function path_1x_webp()
    {
        return ImageService::getImagePath1X($this->slider->image_name_sm).'.webp';
    }

    public function path_2x_webp()
    {
        return ImageService::getImagePath2X($this->slider->image_name_sm).'.webp';
    }

    public function path_3x_webp()
    {
        return ImageService::getImagePath3X($this->slider->image_name_sm).'.webp';
    }



}
