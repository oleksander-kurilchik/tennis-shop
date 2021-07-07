<?php


namespace TrekSt\Modules\Orders\Presenters\Frontend;


use Carbon\Carbon;

class OrderPresenter
{
    protected $order;
    public function __construct($order)
    {
        $this->order = $order;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->order->$key;
    }
    public function date(){
      return   Carbon::parse($this->order->date_order)->format('d.m.Y, h:i');
    }
    public function status(){

        return trans('order.status.'.$this->order->status);
    }
    public function price(){
        return $this->order->price->price;
    }

    public function paymentMethod(){
         return trans('order.payment_method.'.$this->order->payment_method);
    }
    public function deliveryMethod(){
        if($this->order->delivery){
            return trans('order.delivery_method.'.$this->order->delivery->delivery_method);
        }
        return '';
    }

    public function deliveryAddress(){
        if($this->order->delivery){
            return $this->order->delivery->city_name  . ' '. $this->order->delivery->warehouse_name;
        }
    }








}
