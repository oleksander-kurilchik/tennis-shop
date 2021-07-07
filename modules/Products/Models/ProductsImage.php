<?php

namespace TrekSt\Modules\Products\Models;


use Illuminate\Database\Eloquent\Model;
use Storage;
use File;
use Image;
use App\Models\Admin\Traits\ImageExtentionTrait;
use TrekSt\Modules\Products\Services\ProductsImageService;
use TrekSt\Modules\Products\UrlPresenter\ImageUrlPresenter;

class ProductsImage extends Model
{

    protected $table = 'products_images';
    protected $touches = ['product'];
    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'image_name', 'logo_status'];
    public function product()
    {
        return $this->belongsTo(Product::class,'products_id');
    }




    public function getPathAttribute(){
        if(!$this->pathAttr){
            $this->pathAttr = new ImageUrlPresenter($this);
        }
        return  $this->pathAttr;
    }

}
