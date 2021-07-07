<?php


namespace TrekSt\Modules\LandingPages\Presenters\Frontend;


use TrekSt\Modules\LandingPages\Seo\OpenGraph\PageOpenGraph;
use TrekSt\Modules\LandingPages\Seo\SchemaOrg\PageSchemaOrg;
use TrekSt\Modules\Products\Seo\OpenGraph\ProductOpenGraph;
use TrekSt\Modules\Products\Seo\SchemaOrg\ProductSchemaOrg;

class PagePresenter
{
    protected $page;
    public function __construct($page)
    {
        $this->page = $page;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->page->$key;
    }

    public function url(){
        if($this->page->slug == 'index'){
            return  route('frontend.index');
        }
      return  route('frontend.landing_pages.show', ['slug' => $this->page->slug]);
    }



    protected function seo_title(){
        if ($this->page->trans->seo_title){
            return $this->page->trans->seo_title;
        }
        return $this->page->trans->title;
    }
    protected function seo_keywords(){
        if ($this->page->trans->seo_keywords){
            return $this->page->trans->seo_keywords;
        }
        return $this->page->trans->title;
    }
    protected function seo_description(){
        if ($this->page->trans->seo_description){
            return $this->page->trans->seo_description;
        }
        return $this->page->trans->title;
    }


    protected function schemaOrg(){
       return (new PageSchemaOrg($this->page))->render();
    }


    protected function openGraph(){
        return  (new PageOpenGraph($this->page))->render();
    }





}
