<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Currencies\Models\Currency;

class OrdersPrice extends Model
{
    protected $table = 'order_price';
    protected $fillable = ['orders_id', 'currency_id', 'price',];


    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withDefault();
    }

//    public function getPriceAttribute($value)
//    {
//        return format_price($value);
//    }


}
