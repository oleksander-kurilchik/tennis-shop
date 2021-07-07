<?php


namespace TrekSt\Modules\Categories\Services;


use TrekSt\Modules\News\Models\NewsImage;
use File;
use Image;

class CategoriesImageService
{
    protected static $diskName = 'categories_images';
    protected static $imageNamePrefix = 'categories_images';


    protected static $pathOrigin = 'origin';
    protected static $pathBig = 'big';
    protected static $pathMedium = 'medium';
    protected static $pathSmall = 'small';

    protected static $bigSize = ['width' => 1500, 'height' => 1020];
    protected static $mediumSize = ['width' => 1000, 'height' => 680];
    protected static $smallSize = ['width' => 500, 'height' => 340];
    protected static $disk;
    protected $imageNumber = 0;

    /**
     * @param  int  $imageNumber
     */
    public function setImageNumber(int $imageNumber): void
    {
        $this->imageNumber = $imageNumber;
    }


    public function __construct()
    {

    }

    public function create($image )
    {
        $imageName = $this->createImage($image );
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
        return md5(self::$imageNamePrefix.microtime().'_'.$this->imageNumber).'.'.$extention;
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


        $imageMedium = Image::make($originalImage)->fit(self::$mediumSize['width'],
            self::$mediumSize['height'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        self::disk()->put(self::$pathMedium.'/'.$name, $imageMedium->encode());


        $imageSmall = \Image::make($originalImage)->fit(self::$smallSize['width'], self::$smallSize['height'],
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        self::disk()->put(self::$pathSmall.'/'.$name, $imageSmall->encode());

        unset($originalImage,$imageBig,$imageMedium,$imageSmall);




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
    public static function getBigImagePath($name)
    {
        return self::disk()->url(self::$pathBig."/".$name);
    }

    public static function getMediumImagePath($name)
    {
        return self::disk()->url(self::$pathMedium."/".$name);

    }

    public static function getSmallImagePath($name)
    {
        return self::disk()->url(self::$pathSmall."/".$name);
    }

    public static function getImage($name)
    {
        $originalImage = self::disk()->get(self::$pathSmall.'/'.$name);
        return \Image::make($originalImage);
    }





}
