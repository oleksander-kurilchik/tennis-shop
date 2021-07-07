<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend as User;
use Lang;

class OrdersDelivery extends Model
{



    protected $table = 'orders_delivery';
    protected $primaryKey = 'id';
    protected $fillable = ['delivery_method','city_id','city_name','warehouse_id','warehouse_name'];

    public function order(){
        return $this->belongsTo(Order::class,'orders_id');
    }
    public function getDeliveryTypeTextAttribute()
    {
        return trans('order.delivery_method.'.$this->delivery_method);
    }





}
