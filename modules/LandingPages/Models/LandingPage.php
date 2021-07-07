<?php

namespace TrekSt\Modules\LandingPages\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\LandingPages\Presenters\Frontend\PagePresenter;

class LandingPage extends Model
{

    protected $table = 'landing_pages';
    protected $primaryKey = 'id';
    protected $fillable = [  'slug', 'published' ,'name'];

    public function translating()
    {
        return $this->hasMany(LandingPageTranslating::class, 'landing_pages_id');
    }
    public function delete()
    {
        $this->translating()->delete();
        $this->items()->delete();
        return parent::delete();
    }

    public  function items( )
    {
        return $this->hasMany(LandingPagesItem::class,'landing_pages_id');
    }

    public static function boot()
    {
        parent::boot();
     //   self::observe(new LandingPageObserver());

    }

    public function scopePublished($query)
    {
        return $query->where('published', true) ;
    }

    public function trans()
    {
        return $this->hasOne(LandingPageTranslating::class, 'landing_pages_id')
            ->where('languages_id', \FLang::langId())->withDefault([]);
    }

    public function getUrlAttribute()
    {
        if(\Route::has('frontend.landing_pages.show')) {
            return route('frontend.landing_pages.show', ['slug' => $this->slug]);
        }
    }




    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new PagePresenter($this);
        }
        return  $this->frontendAttr;
    }



    public  function imageItems( )
    {
        return $this->hasMany(LandingPagesItem::class,'landing_pages_id') ->where("languages_id", \FLang::langId() )->orderBy('order')
            ->where('type','image')
            ->where('published',true);
    }


}
