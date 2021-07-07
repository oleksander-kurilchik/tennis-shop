<?php

namespace TrekSt\Modules\ProductsAttributes\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductsProductAttributePivot extends Model
{
    use HasTranslations;
    protected $table = 'products_product_attributes_pivot';
    public $fillable = ['value_text','value_double','product_id','product_attribute_id','order'];
    public $translatable = ['value_text','attribute_title'];
}
