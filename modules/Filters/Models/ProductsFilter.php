<?php

namespace TrekSt\Modules\Filters\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Products\Models\Product;


class ProductsFilter extends Model
{

    protected $table = 'products_filter';

    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'filters_values_id'];
//    protected $touches = ['product'];

    public function product()
    {
        return $this->belongsTo(Product::class,"products_id");
    }
    public function filters_value($column)
    {
        return $this->belongsTo(FiltersValue::class,"filters_values_id");
    }

}
