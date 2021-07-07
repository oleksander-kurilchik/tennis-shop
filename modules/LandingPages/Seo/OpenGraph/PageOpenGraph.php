<?php


namespace TrekSt\Modules\LandingPages\Seo\OpenGraph;
use CurrencyHandler;
use OpenGraph;



class PageOpenGraph
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function render(){
        $model = $this->model;
        $og = OpenGraph::clear();
        $og->title($model->front->seo_title)
            ->type('article')
            ->description($model->front->seo_description)
            ->url();

        foreach($this->model->imageItems as $imageItem){
                $og->image( asset($imageItem->getItem()->getImagePath()));
        }
        return $og->renderTags();
    }
}
