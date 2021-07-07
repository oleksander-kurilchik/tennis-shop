<?php


namespace TrekSt\Modules\Orders\Repositories\Admin;


use TrekSt\Modules\Orders\Models\Order;

class OrderRepository
{

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->newQuery()->managerFilter()->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->orderModel->newQuery()->findOrFail($id);
    }
    public function paginateIndex($queryCondition = [])
    {
        $query = $this->orderModel->newQuery()->managerFilter()->orderByDesc('id');
        if(isset($queryCondition['keyword'])){
            $keyword = $queryCondition['keyword'];
            $query->orWhere('first_name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
//                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('ip', 'LIKE', "%$keyword%");
        }
        if(isset($queryCondition['users_id'])){
            $query->where('users_id',$queryCondition['users_id']);
        }




        return $query->paginate();
    }


    public function create(array $data){

        $model = $this->baseModel->newQuery()->create($data);
        $languages = $this->languageModel->query()->get();
        foreach ($languages as $lang) {
            $translating = $this->translatingModel->newInstance()  ;
//          $translating->setEmptyValue();
            $translating->title = $model->name;
            $translating->languages_id = $lang->id;
//          $translating->seo_title = config('site.news.seo_title_'.app()->getLocale());;
//          $translating->seo_keywords = config('site.news.seo_keywords_'.app()->getLocale());;
//          $translating->seo_description = config('site.news.seo_description_'.app()->getLocale());;
            $model->translating()->save($translating);
        }
        return $model;

    }

    public function updateById($id,$inputs)
    {
        $model = $this->baseModel->newQuery()->findOrFail($id);
        $model->update($inputs) ;
        return $model;
    }
    public function deleteById($id)
    {
        $model = $this->orderModel->newQuery()->findOrFail($id);
        $model->delete();
        return $model;
    }





}
