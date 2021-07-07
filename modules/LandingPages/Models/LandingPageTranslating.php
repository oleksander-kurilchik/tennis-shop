<?php

namespace TrekSt\Modules\LandingPages\Models;

use Illuminate\Database\Eloquent\Model;
use  TrekSt\Modules\Languages\Models\Language;



class LandingPageTranslating extends Model
{
    protected $table = 'landing_pages_translating';
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['landing_pages_id',
        'languages_id',
        'title',
        'description',
        "seo_title",
        "seo_description",
        "seo_keywords",
        "seo_text",
    ];


    public function language()
    {
        return $this->belongsTo(Language::class, "languages_id");
    }




}
