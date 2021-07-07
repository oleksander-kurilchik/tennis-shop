<?php


namespace TrekSt\Modules\LandingPages\Seo\SchemaOrg;


use Carbon\Carbon;
use Spatie\SchemaOrg\Schema;
use CurrencyHandler;

class PageSchemaOrg
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function render(){

        $model = $this->model;
        $page = Schema::webPage();
        $page->name($model->front->seo_title);
        $page->description($model->front->seo_description);
        $page->url($model->url);
        $images = [];


        foreach($this->model->imageItems as $imageItem){
            $images[] =  asset($imageItem->getItem()->getImagePath());
        }
        if (count($images)) {
            $page->image($images);
        }
        return $page->toScript();
    }

}
