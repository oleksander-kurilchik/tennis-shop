<?php

namespace TrekSt\Modules\Products\Models;


use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Languages\Models\Language;

class ProductsTranslating extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $touches = ['product'];
    protected $table = 'products_translatings';

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
    protected $fillable = ['products_id', 'languages_id', 'name', 'title',
        'description',
        'short_description',
        'seo_title',
        'seo_description',
        'seo_keywords', 'seo_text',
        'season',
        'collection',
        'material_outside',
        'material_inside',
        'color',
        'heel_type',



    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'languages_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }


    public function getSeoTitleAttribute($value)
    {
        if(config('site.seo.is_frontend') !=true ) return $value;

        if ($value != null)
            return $value;

        return str_replace('%replased%', $this->title, config('site.product.seo.title_mask',''));
    }

    public function getSeoDescriptionAttribute($value)
    {
        if(!config('site.seo.is_frontend')!=true ) return $value;

        if ($value !=null)
            return $value;
        return str_replace('%replased%', $this->title, config('site.product.seo.description_mask' ,''));
    }

    public function getSeoKeywordsAttribute($value)
    {
        if(!config('site.seo.is_frontend')!=true ) return $value;

        if ($value !=null)
            return $value;
        return str_replace('%replased%', $this->title, config('site.product.seo.keywords_mask',''));
    }




}
