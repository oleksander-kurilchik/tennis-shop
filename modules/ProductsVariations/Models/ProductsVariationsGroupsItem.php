<?php

namespace TrekSt\Modules\ProductsVariations\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\Products\Models\Product;
use Spatie\Translatable\HasTranslations;

class ProductsVariationsGroupsItem extends Model
{
    use HasTranslations;
    use Sortable;
    public $fillable = ['groups_id','name','products_id','title','order','value','published'];
    protected $table = 'product_variation_groups_items';
    protected $primaryKey = 'id';
    public $translatable = ['title'];

    public function product(){
        return $this->belongsTo(Product::class,'products_id') ;
    }

}
