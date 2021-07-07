<?php


namespace TrekSt\Modules\ProductsReviews\Repository\Admin;

use Carbon\Carbon;
use TrekSt\Modules\ProductsReviews\Models\ProductsReviews;
use TrekSt\Modules\ProductsReviews\Models\ProductsReviewsAnswer;

class ProductsReviewsRepository
{
    public function __construct()
    {
        $this->baseModel = new ProductsReviews();
        $this->baseAnswerModel = new ProductsReviewsAnswer();
    }


    public function getForEdit(int $id)
    {
        $review =  $this->baseModel->findOrFail($id);
        if ($review->read_at === null) {
            $review->read_at = Carbon::now()->toDateTimeString();;
            $review->save();
        }
        $review->load(['answer']);
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
    public function paginateIndex($queryCondition = [])
    {
        $query = $this->baseModel->query()->sortable();
        if(isset($queryCondition['keyword'])){
            $keyword = $queryCondition['keyword'];
            $query->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%");
        }
        if(isset($queryCondition['products_id'])){
            $query->where('products_id',$queryCondition['products_id']);
        }

        return $query->paginate();
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
    public function deleteAnswerById($id)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->answer()->delete();
        return $model;
    }

    public function updateOrderById($id,$order)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->order = $order ;
        $model->save() ;
        return $model;
    }



    public function delete($list)
    {
        $this->baseAnswerModel->newQuery()->whereIn('products_reviews_id',$list)->delete();
        $this->baseModel->newQuery()->whereIn('id',$list)->delete();
    }

    public function setAsRevised($list)
    {
         $this->baseModel->newQuery()->whereIn('id',$list)->update(["revised"=>true]);
    }






}
