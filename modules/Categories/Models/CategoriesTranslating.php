<?php

namespace TrekSt\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Languages\Models\Language;


class CategoriesTranslating extends Model
{

    protected $touches = ['category'];
    protected $table = 'categories_translating';
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categories_id',
        'languages_id',
        'title',
        'sub_title',
        'description',
        "short_description",
        "seo_title",
        "seo_description",
        "seo_keywords",
        "seo_text",
    ];


    public function language()
    {
        return $this->belongsTo(Language::class, "languages_id");
    }

    public function setEmptyValue()
    {
        $this->title = $this->description = $this->short_description = "Empty";
        $this->seo_title = $this->seo_description = $this->seo_keywords = $this->seo_text = null;

    }


    public function category()
    {
        return $this->belongsTo(Category::class, "categories_id");
    }



    public function getSeoTitleAttribute($value)
    {
        if(config('site.seo.is_frontend') !=true ) return $value;

        if ($value != null)
            return $value;

        return str_replace('%replased%', $this->title, config('site.category.seo.title_mask',''));
    }

    public function getSeoDescriptionAttribute($value)
    {
        if(!config('site.seo.is_frontend')!=true ) return $value;

        if ($value !=null)
            return $value;
        return str_replace('%replased%', $this->title, config('site.category.seo.description_mask' ,''));
    }

    public function getSeoKeywordsAttribute($value)
    {
        if(!config('site.seo.is_frontend')!=true ) return $value;

        if ($value !=null)
            return $value;
        return str_replace('%replased%', $this->title, config('site.category.seo.keywords_mask',''));
    }



}
