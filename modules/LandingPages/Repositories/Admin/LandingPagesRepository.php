<?php


namespace TrekSt\Modules\News\Repositories\Admin;


class LandingPagesRepository
{
    protected $baseModel;
    public function __construct($baseModel,$languageModel, $translatingModel )
    {
        $this->baseModel = $baseModel;
        $this->languageModel = $languageModel;
        /**
        @var $this->translatingModel \TrekSt\Modules\News\Models\NewsTranslating;
         */
        $this->translatingModel = $translatingModel;
    }

    public function getForEdit(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }

    public function get(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }
    public function paginateIndex($keyword = null)
    {
        $query = $this->baseModel->query();
        if (!empty($keyword)) {
            $query->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%");
        }
        return $query->paginate();
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



}
