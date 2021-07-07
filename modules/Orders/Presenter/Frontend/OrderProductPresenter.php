<?php


namespace TrekSt\Modules\Orders\Presenters\Frontend;


use Carbon\Carbon;

class OrderProductPresenter
{
    protected $orderProduct;
    public function __construct($orderProduct)
    {
        $this->orderProduct = $orderProduct;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->orderProduct->$key;
    }


    public function price(){
        return $this->orderProduct->price->price;
    }


    public function title(){
        if($this->orderProduct->product){
            return  $this->orderProduct->product->trans->title;
        }
        return $this->orderProduct->product_name;
    }

    public function logo(){
        if($this->orderProduct->product && $this->orderProduct->product->logo){
            return  $this->orderProduct->product->logo->path->path_0x;
        }
//        return $this->orderProduct->product_name;
    }




//    public function url(){
//      return  route('frontend.products.show', ['slug' => $this->product->slug]);
//    }
//
//    public function price(){
//        $cc = \CurrencyHandler::current();
//        $price =  round($this->product->price / $this->currency->course  *  $cc->course,$cc->round);
//        return $price;
//    }
//
//
//    public function old_price(){
//        $cc = \CurrencyHandler::current();
//        return round($this->product->old_price / $this->product->currency->course  *  $cc->course,$cc->round);
//    }
//
//
//
//
//    protected function discountPercent(){
//        if ($this->old_price > $this->price && $this->price > 0.001) {
//            return round((($this->old_price - $this->price) / $this->old_price) * 100);
//        }
//        return 0;
//    }
    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new OrderPresenter($this);
        }
        return  $this->frontendAttr;
    }



}
