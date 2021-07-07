<?php

namespace TrekSt\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\Products\Models\Product;
use Kalnoy\Nestedset\NodeTrait;
use TrekSt\Modules\Categories\Presenters\Frontend\CategoryPresenter;

class Category extends Model
{
    use NodeTrait;
    use Sortable;
    public const PARENT_NOT_FOUND = 1;

    protected $table = 'categories';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'category_id','order','logo_type', 'slug', 'published' ,'name' , 'show_on_mainpage','color'];

    public function images()
    {
        return $this->hasMany(CategoriesImage::class, 'categories_id');
    }

    public function translating()
    {
        return $this->hasMany(CategoriesTranslating::class,'categories_id' ,'id');
    }


    public function canDelete(){
        return $this->childrens()->count() || $this->products()->count();
    }


    public function delete()
    {
        $this->images()->delete();
        $this->translating()->delete();
        return parent::delete();
    }
    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('order','asc')->
        whereDoesntHave('ancestors', function ( $query) {
            $query->where('published', false);
        });
    }


    public function hasChild()
    {
        return $this->childrens->count() > 0 ? true : false;
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id','id');

    }

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id','id');

    }

    public function hasProduct()
    {
        $count =  $this->products->count();
        return $count > 0 ? true : false;
    }

    public function getLevelNameAttribute()
    {
        $max_iteration_count = 6;
        $current_item = $this;
        $array_name = [];
        for ($i = 0; $i < $max_iteration_count; $i++) {
            $array_name[] = $current_item->name;
            if ($current_item->parent == null) {
                return implode("  >>  ", array_reverse($array_name));
            }
            $current_item = $current_item->parent;
            if ($current_item === null) {
                return false;
            }
        }
        return false;
    }


    public function trans()
    {
        return $this->hasOne(CategoriesTranslating::class, 'categories_id')
            ->where('languages_id', \FLang::langId())->withDefault();
    }






    public function getParentLevelName()
    {
        $parent = Category::find($this->parent_id);
        if ($parent != null) {
            return $parent->levelName;
        }
        return "Нема категорії";
    }


    public function products()
    {
        return $this->hasMany(Product::class, "categories_id");
    }

    public function logo()
    {
        return $this->hasOne(CategoriesImage::class, "categories_id")
            ->orderByDesc("logo_status");
    }



    public function getUrlAttribute()
    {
        if(\Route::has('frontend.categories.show')) {
            return route('frontend.categories.show', ['slug' => $this->slug]);
        }
    }



    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new CategoryPresenter($this);
        }
        return  $this->frontendAttr;
    }



}
