<?php


namespace TrekSt\Modules\Products\Presenters\Frontend;


use TrekSt\Modules\Products\Seo\OpenGraph\ProductOpenGraph;
use TrekSt\Modules\Products\Seo\SchemaOrg\ProductSchemaOrg;

class ProductPresenter
{
    protected $product;
    public function __construct($product)
    {
        $this->product = $product;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->product->$key;
    }

    public function url(){
      return  route('frontend.products.show', ['slug' => $this->product->slug]);
    }

    public function price(){
        $cc = \CurrencyHandler::current();
        $price =  round($this->product->price / $this->currency->course  *  $cc->course,$cc->round);
        return $price;
    }


    public function old_price(){
        $cc = \CurrencyHandler::current();
        return round($this->product->old_price / $this->product->currency->course  *  $cc->course,$cc->round);
    }




    protected function discountPercent(){
        if ($this->old_price > $this->price && $this->price > 0.001) {
            return round((($this->old_price - $this->price) / $this->old_price) * 100);
        }
        return 0;
    }


    protected function seo_title(){
        if ($this->product->trans->seo_title){
            return $this->product->trans->seo_title;
        }
        return $this->product->trans->title;
    }
    protected function seo_keywords(){
        if ($this->product->trans->seo_keywords){
            return $this->product->trans->seo_keywords;
        }
        return $this->product->trans->title;
    }
    protected function seo_description(){
        if ($this->product->trans->seo_description){
            return $this->product->trans->seo_description;
        }
        return $this->product->trans->title;
    }


    protected function schemaOrg(){
       return (new ProductSchemaOrg($this->product))->render();
    }


    protected function openGraph(){
        return  (new ProductOpenGraph($this->product))->render();
    }





}
