<?php


namespace TrekSt\Modules\ProductsReviews\Repository\Admin;

use Carbon\Carbon;
 use TrekSt\Modules\ProductsReviews\Models\ProductsReviewsAnswer;

class ProductsReviewsAnswerRepository
{
    public function __construct()
    {
        $this->baseModel = new ProductsReviewsAnswer();
    }


    public function getForEdit(int $id)
    {
        $review =  $this->baseModel->findOrFail($id);
        if ($review->read_at === null) {
            $review->read_at = Carbon::now()->toDateTimeString();;
            $review->save();
        }
        return $review;
    }

    public function get(int $id)
    {
        $review =  $this->baseModel->findOrFail($id);
        if ($review->read_at === null) {
            $review->read_at = Carbon::now()->toDateTimeString();;
            $review->save();
        }
        return $review;
    }



    public function create(array $data){

        $model = $this->baseModel->create($data);


        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->delete();
        return $model;
    }





}
