<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
 use Log;
use Session;
use Route;
use TrekSt\Modules\Orders\Presenters\Frontend\OrderProductPresenter;
use TrekSt\Modules\Products\Models\Product;

class OrdersProduct extends Model
{
    protected $table = 'orders_products';
    protected $primaryKey = 'id';


    public function order()
    {
        return $this->belongsTo(Order::class, "orders_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "products_id");
    }


    public function prices()
    {
        return $this->hasMany(OrdersProductsPrice::class, "orders_products_id")->orderBy("currency_id");
    }



    public function price()
    {
        $relation =  $this->hasOne(OrdersProductsPrice::class, 'orders_products_id');
        $relation->getQuery()
            ->join('orders_products','orders_products.id', '=' , 'orders_products_price.orders_products_id' )
            ->join('orders','orders.id', '=' , 'orders_products.orders_id' )

        ->whereRaw('orders.currency_id = orders_products_price.currency_id' );
        return $relation;
    }


    public function delete()
    {
        $this->prices()->delete();
        return parent::delete(); // TODO: Change the autogenerated stub
    }


    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new OrderProductPresenter($this);
        }
        return  $this->frontendAttr;
    }


}
