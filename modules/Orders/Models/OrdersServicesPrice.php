<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
use Session;
use Route;
use TrekSt\Modules\Currencies\Models\Currency;

class OrdersServicesPrice extends Model
{
    protected $table = 'orders_services_prices';
    protected $primaryKey = 'id';
    protected $fillable = ['orders_services_id','currency_id','price'];

    public function orderService()
    {
        return $this->belongsTo(OrdersService::class, 'orders_orders_services_id');
    }
    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id')->withDefault(['course'=>1]);
    }




}
