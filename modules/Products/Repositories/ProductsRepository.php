<?php


namespace TrekSt\Modules\Products\Repositories\Admin;


use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Models\ProductsTranslating;

class ProductsRepository
{
    protected $baseModel;
    public function __construct()
    {
        $this->baseModel = new Product();
        $this->languageModel = new Language();
        $this->translatingModel = new ProductsTranslating();
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
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('vendor_code', 'LIKE', "%$keyword%");
        }
        if(isset($queryCondition['categories_id'])){
            $query->where('categories_id',$queryCondition['categories_id']);
        }
        if(isset($queryCondition['sale'])){
            $query->where('sale',$queryCondition['sale']);
        }
        if(isset($queryCondition['new'])){
            $query->where('new',$queryCondition['new']);
        }

        $query->with(['logo','currency','category']);



        return $query->with(['category', 'logo'])->paginate();
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




    public function getLevelList(){
//        return collect();
       return $this->baseModel->withDepth()->get()->toFlatTree();
    }


    public function fixNestedTree(){
        $this->baseModel->fixTree();
    }

    public function getForEditHierarchy(){
     return   $this->baseModel->doesntHave('parent')
            ->with('childrens.childrens.childrens.childrens.childrens.childrens.childrens.childrens.childrens.childrens')
            ->get();
    }


    public  function updateHierarchy($data){
        $this->orderCategoryItem($data,null);
        $this->fixNestedTree();

    }
    private function orderCategoryItem(array $categories, $parentId)
    {
        foreach ($categories as $index => $category) {
            $item = $this->baseModel->query()->where('id',$category['id'])->update(['order'=>$index + 1 ,'parent_id' => $parentId]);
            if (isset($category['children'])) {
                $this->orderCategoryItem($category['children'], $category['id']);
            }
        }
    }




}
