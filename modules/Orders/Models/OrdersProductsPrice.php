<?php

namespace TrekSt\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Currencies\Models\Currency;

class OrdersProductsPrice extends Model
{
    protected $table = 'orders_products_price';

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

//    public function getPriceAttribute($value)
//    {
//        return format_price($value);
//    }
//    public function getTotalPriceAttribute($value)
//    {
//        return format_price($value);
//    }
}
