<?php


namespace TrekSt\Modules\Filters\Repositories\Admin;


use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Models\FiltersValuesTranslating;
use TrekSt\Modules\Languages\Models\Language;

class FiltersValuesRepository
{
    protected $baseModel;
    public function __construct( )
    {
        $this->baseModel = new FiltersValue();
        $this->languageModel = new Language();
        /**
        @var $this->translatingModel \TrekSt\Modules\News\Models\NewsTranslating;
         */
        $this->translatingModel = new FiltersValuesTranslating();
    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }
    public function paginateIndex($queryCondition = [])
    {
        $query = $this->baseModel->query()->sortable();
        if(isset($queryCondition['keyword'])){
            $keyword = $queryCondition['keyword'];
            $query->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%");
        }
        if(isset($queryCondition['filters_id'])){
            $query->where('filters_id',$queryCondition['filters_id']);
        }

        return $query ->paginate();
    }


    public function create(array $data){

        $model = $this->baseModel->create($data);
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

    public function updateOrderById($id,$order)
    {
        $model = $this->baseModel->findOrFail($id);
        $model->order = $order ;
        $model->save() ;
        return $model;
    }


    public function deleteByFilter($filter_id)
    {
        $values = $this->baseModel->where('filters_id',$filter_id)->get();
        foreach ($values as $item){
             $item->delete();
        }
        return $values;
    }



//    private function orderCategoryItem(array $categories, $parentId)
//    {
//        foreach ($categories as $index => $category) {
//            $item = $this->baseModel->query()->where('id',$category['id'])->update(['order'=>$index + 1 ,'parent_id' => $parentId]);
//            if (isset($category['children'])) {
//                $this->orderCategoryItem($category['children'], $category['id']);
//            }
//        }
//    }




}
