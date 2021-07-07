<?php

namespace TrekSt\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Categories\Services\CategoriesImageService;

class CategoriesImage extends Model
{
    protected $table = 'categories_images';
    protected $primaryKey = 'id';
    protected $fillable = ['categories_id', 'image_name', 'logo_status'];
    protected $touches = ['category'];

    public function isLogo()
    {
        return $this->logo_status == 1 ? true : false;
    }

    public function category(){
        return $this->belongsTo(Category::class,'categories_id');
    }





    public function getSmallPathAttribute()
    {
        return  CategoriesImageService::getSmallImagePath($this->image_name);

    }
    public function getMediumPathAttribute()
    {
        return  CategoriesImageService::getMediumImagePath($this->image_name);
    }
    public function getBigPathAttribute()
    {
        return  CategoriesImageService::getBigImagePath($this->image_name);
    }
    public function getOriginPathAttribute()
    {
        return  CategoriesImageService::getOriginImagePath($this->image_name);
    }

}
