<?php
namespace TrekSt\Modules\Categories\Seo\SchemaOrg;


use Carbon\Carbon;
use Spatie\SchemaOrg\Schema;
use CurrencyHandler;

class CategorySchemaOrg
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function render(){

        $model = $this->model;
        $itemList = Schema::itemList();
        $itemList->name($model->trans->title);
        $itemList->description($model->trans->short_description);
        $itemList->url(url()->current());



        return $itemList->toScript();
    }

}
