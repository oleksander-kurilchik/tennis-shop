<?php

namespace TrekSt\Modules\ProductsReviews\Models;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\Products\Models\Product;


class ProductsReviews extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products_reviews';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = ['description','user_name','products_id','email','published','rating','date_of_sending'];


    public function answer()
    {
        return $this->hasOne(ProductsReviewsAnswer::class,"products_reviews_id") ;
    }


    public function product()
    {
        return $this->belongsTo(Product::class,"products_id");
    }



    public function delete()
    {
        $this->answer()->delete();
        return parent::delete();
    }







}
