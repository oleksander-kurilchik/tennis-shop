<?php

namespace TrekSt\Modules\Filters\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Languages\Models\Language;

class FiltersValuesTranslating extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'filters_values_translating';

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
    protected $fillable = [
        'filters_id', 'languages_id', 'name', 'title', 'description', 'short_description',
        "seo_title",
        "seo_description",
        "seo_keywords",
        "seo_text",
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, "languages_id");
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class, "filters_id");
    }

    public function setEmptyValue()
    {
        $this->title = $this->description = $this->short_description = "Empty";
        $this->seo_title = $this->seo_description = $this->seo_keywords = $this->seo_text = null;
    }

}
