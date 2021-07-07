<?php


 namespace TrekSt\Modules\Products\Seo\OpenGraph;

use CurrencyHandler;
use OpenGraph;



class ProductOpenGraph
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
            ->type('product')
            ->description($model->trans->seo_description)
            ->url();
        foreach ($model->images as $image) {
            $og->image($image->path->path_1x);
            $og->image($image->path->path_2x);
            $og->image($image->path->path_3x);


        }
        $og->attributes('product', ['price:amount' => format_price($model->front->price)]);
        $og->attributes('product', ['price:currency' => strtoupper(CurrencyHandler::current()->code)]);
        $og->attributes('product', ['isbn' => $model->vendor_code]);
        return $og->renderTags();
    }
}
