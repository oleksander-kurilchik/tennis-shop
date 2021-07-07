<?php


namespace TrekSt\Modules\Categories\Presenters\Frontend;


use TrekSt\Modules\Categories\Seo\OpenGraph\CategoriesOpenGraph;

class CategoryPresenter
{
    protected $category;
    public function __construct($category)
    {
        $this->category = $category;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->category->$key;
    }

    public function url(){
        if(\Route::has('frontend.categories.show')) {
            return route('frontend.categories.show', ['slug' => $this->slug]);
        }
    }






    protected function seo_title(){
        if ($this->category->trans->seo_title){
            return $this->category->trans->seo_title;
        }
        return $this->category->trans->title;
    }
    protected function seo_keywords(){
        if ($this->category->trans->seo_keywords){
            return $this->category->trans->seo_keywords;
        }
        return $this->category->trans->title;
    }
    protected function seo_description(){
        if ($this->category->trans->seo_description){
            return $this->category->trans->seo_description;
        }
        return $this->category->trans->title;
    }


//    protected function schemaOrg(){
//        return (new ProductSchemaOrg($this->product))->render();
//    }


    protected function openGraph(){
        return  (new CategoriesOpenGraph($this->category))->render();
    }






}
