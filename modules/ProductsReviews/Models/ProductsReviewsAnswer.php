<?php

namespace TrekSt\Modules\ProductsReviews\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductsReviewsAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products_reviews_answers';
    protected $fillable = ['products_reviews_id', 'name', 'user_name', 'description'
        , 'date_answer',"published"];

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    public function reviews()
    {
        return $this->belongsTo(ProductsReviews::class," products_reviews_id ");
    }

    public function getDateAttribute()
    {
       return Carbon::parse($this->date_answer)->format("d-m-Y ");
    }
}
