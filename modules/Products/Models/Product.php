<?php

namespace TrekSt\Modules\Products\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Currencies\Models\Currency;
use TrekSt\Modules\Products\Presenters\Frontend\ProductPresenter;

class Product extends Model
{
    use Sortable;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'order',
        'slug',
        'vendor_code',
        'published',
        'quantity',
        'price',
        'old_price',
        'available',
        'under_the_order',
        'currencies_id',
        'vendors_id',
        'sale',
        'dimensional_grid',
        'new',
        'top',
        'not_available',
        'categories_id'
    ];

    public function images()
    {
        return $this->hasMany(ProductsImage::class, "products_id");
    }

    public function translating()
    {
        return $this->hasMany(ProductsTranslating::class, "products_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "categories_id");
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currencies_id");
    }


    public function logo()
    {
        return $this->hasOne(ProductsImage::class, 'products_id')
            ->orderByDesc('logo_status')->orderBy('id');
    }

    public function scopePublished($query)
    {
        return $query->where('products.published', true)
             ->whereNotExists(function ($query){
                 $query->select('*')
                     ->from('categories as c_p')
                     ->leftJoin('categories as c_pj', function($join)
                     {
                         $join->on('c_p._lft', '<=', 'c_pj._lft');
                         $join->on('c_p._rgt', '>=', 'c_pj._rgt');
                     })
                     ->whereColumn('c_pj.id', 'products.categories_id')
                     ->where('c_p.published', false);
             }) ->with(['currency']) ;
    }

    public function trans()
    {
        return $this->hasOne(ProductsTranslating::class, 'products_id')
            ->where('languages_id', \FLang::langId())->withDefault();
    }





    public function delete()
    {
        $this->translating()->delete();
        $this->images()->delete();
        return parent::delete();
    }


    ///////////////////////**********************************
    public function scopePriceFrom($query, float $price)
    {
        if (!self::hasJoin($query->getQuery(), 'currencies')) {
            $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
        }
        $price = $price / \CurrencyHandler::current()->course;
        return $query->where(\DB::raw('(products.price / currencies.course)'), '>=', $price);
    }


    public function scopePriceTo($query, float $price)
    {
        if (!self::hasJoin($query->getQuery(), 'currencies')) {
            $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
        }
        $price = $price / \CurrencyHandler::current()->course;
        return $query->where(\DB::raw('(products.price / currencies.course)'), '<=', $price);
    }


    public static function  hasJoin(\Illuminate\Database\Query\Builder $Builder, $table)
    {
        if (!$Builder->joins)
        {
            return false;
        }
        foreach($Builder->joins as $JoinClause)
        {
            if($JoinClause->table == $table)
            {
                return true;
            }
        }
        return false;
    }


    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new ProductPresenter($this);
        }
        return  $this->frontendAttr;
    }




}
