<?php

namespace TrekSt\Modules\ProductsVariations\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Translatable\HasTranslations;
class ProductsVariationsGroup extends Model
{
    use Sortable;
    use HasTranslations;
    public $fillable = ['type','name','title','products_id','title_ru','order','published'];
    protected $table = 'product_variation_groups';
    protected $primaryKey = 'id';
    public $translatable = ['title'];

    public function items(){
        return $this->hasMany(ProductsVariationsGroupsItem::class,'groups_id');
    }
    public function delete()
    {
        $this->items()->delete();
        return parent::delete(); // TODO: Change the autogenerated stub
    }
    public function scopePublished($query){
        return $query->where('published',true)->orderBy('order');
    }


}