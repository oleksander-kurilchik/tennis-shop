<?php


namespace TrekSt\Modules\MainSlider\Services;


 use File;
use Image;

class ImageSmallService
{
    protected static $diskName = 'main_slider_sm';
    protected static $imageNamePrefix = 'main_slider_sm';




    protected static $pathOrigin = 'origin';
    protected static $pathBig = 'big';
    protected static $pathMedium = 'medium';
    protected static $pathSmall = 'small';

    protected static $bigSize = ['width' => 1035, 'height' => 1140];
    protected static $mediumSize = ['width' => 690, 'height' => 760];
    protected static $smallSize = ['width' => 345, 'height' => 380];
    protected static $disk;


    public function __construct()
    {

    }

    public function create($image)
    {
        $imageName = $this->createImage($image);
        return $imageName;

    }



    protected function createImage($image)
    {
        $disk = self::disk();
        $name = $this->createNewName($image->getClientOriginalExtension());
        $disk->put(self::$pathOrigin.'/'.$name, \File::get($image));
        $this->rebuildImageFromOriginal($name);
        return $name;
    }

    protected function createNewName($extention)
    {
        return md5(self::$imageNamePrefix.microtime()).'.'.$extention;
    }

    public function deleteImage($name)
    {
        if (!$name) {
            return;
        }
        if (self::disk()->exists(self::$pathOrigin.'/'.$name)) {
            self::disk()->delete(self::$pathOrigin.'/'.$name);
        }

        if (self::disk()->exists(self::$pathSmall.'/'.$name)) {
            self::disk()->delete(self::$pathSmall.'/'.$name);
        }
        if (self::disk()->exists(self::$pathMedium.'/'.$name)) {
            self::disk()->delete(self::$pathMedium.'/'.$name);
        }
        if (self::disk()->exists(self::$pathBig.'/'.$name)) {
            self::disk()->delete(self::$pathBig.'/'.$name);
        }

        if (self::disk()->exists(self::$pathSmall.'/'.$name.'.webp')) {
            self::disk()->delete(self::$pathSmall.'/'.$name.'.webp');
        }
        if (self::disk()->exists(self::$pathMedium.'/'.$name.'.webp')) {
            self::disk()->delete(self::$pathMedium.'/'.$name.'.webp');
        }
        if (self::disk()->exists(self::$pathBig.'/'.$name.'.webp')) {
            self::disk()->delete(self::$pathBig.'/'.$name.'.webp');
        }





    }


    protected function rebuildImageFromOriginal($name)
    {
        $originalImage = self::disk()->get(self::$pathOrigin.'/'.$name);

        $imageBig = Image::make($originalImage);//->fit(self::$bigSize['width'], self::$bigSize['height']);

        $imageBig->fit(self::$bigSize['width'], self::$bigSize['height'], function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        self::disk()->put(self::$pathBig.'/'.$name, $imageBig->encode());
        self::disk()->put(self::$pathBig.'/'.$name.'.webp', $imageBig->encode('webp'));


        $imageMedium = Image::make($originalImage)->fit(self::$mediumSize['width'],
            self::$mediumSize['height'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        self::disk()->put(self::$pathMedium.'/'.$name, $imageMedium->encode());
        self::disk()->put(self::$pathMedium.'/'.$name.'.webp', $imageMedium->encode('webp'));


        $imageSmall = \Image::make($originalImage)->fit(self::$smallSize['width'], self::$smallSize['height'],
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        self::disk()->put(self::$pathSmall.'/'.$name, $imageSmall->encode());
        self::disk()->put(self::$pathSmall.'/'.$name.'.webp', $imageSmall->encode('webp'));
    }

    public function rebuildImage($image)
    {
        $this->rebuildImageFromOriginal($image->image_name);
    }

    public static function disk()
    {
        if (!self::$disk) {
            self::$disk = \Storage::disk(self::$diskName);
        }
        return self::$disk;
    }


    public static function getOriginImagePath($name)
    {
        return self::disk()->url(self::$pathOrigin."/".$name);
    }

//
     public static function getImagePath3x($name)
     {
         return self::disk()->url(self::$pathBig."/".$name);
     }

     public static function getImagePath2x($name)
     {
         return self::disk()->url(self::$pathMedium."/".$name);

     }

     public static function getImagePath1X($name)
     {
         return self::disk()->url(self::$pathSmall."/".$name);
     }


    public static function getImage($name)
    {
        $originalImage = self::disk()->get(self::$pathSmall.'/'.$name);
        return \Image::make($originalImage);
    }





}
