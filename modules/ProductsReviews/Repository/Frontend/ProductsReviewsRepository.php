<?php


namespace TrekSt\Modules\ProductsReviews\Repository\Frontend;

use TrekSt\Modules\ProductsReviews\Models\ProductsReviews;
use TrekSt\Modules\ProductsReviews\Models\ProductsReviewsAnswer;

class ProductsReviewsRepository
{
    public function __construct()
    {
        $this->baseModel = new ProductsReviews();
    }


     public function create($data){
        $model = $this->baseModel->newQuery()->newModelInstance($data);
         $model->save();
     }


     public function getForProduct($products_id){
         return $this->baseModel->newQuery()->where("products_id",$products_id)->where("published", true)
             ->orderByDesc("date_of_sending")->get();
     }


}
