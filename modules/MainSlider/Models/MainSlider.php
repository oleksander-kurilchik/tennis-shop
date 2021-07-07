<?php

namespace TrekSt\Modules\MainSlider\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Languages\Models\Language;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\MainSlider\UrlPresenter\ImageSmallUrlPresenter;
use TrekSt\Modules\MainSlider\UrlPresenter\ImageUrlPresenter;

class MainSlider extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'main_sliders';

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
    protected $fillable = ['name', 'title',  'description',
        "date_publication", "order", "published", "url","languages_id",'color','url_text'];



    public function scopePublished($query)
    {
        $lang_id = \FLang::langId();
        return $query->where('published', true)->orderBy('order','asc')->
        where(function ($subQuery) use ($lang_id)
        {
            $subQuery->where('languages_id',$lang_id)->
            orwhereNull('languages_id');
        });
    }



    public function getImageSmAttribute(){
        if(!$this->imageSmallAttr){
            $this->imageSmallAttr = new ImageSmallUrlPresenter($this);
        }
        return  $this->imageSmallAttr;
    }


    public function getImageAttribute(){
        if(!isset($this->imageAttr)){
            $this->imageAttr = new ImageUrlPresenter($this);
        }
        return  $this->imageAttr;
    }

}
