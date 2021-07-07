<?php


namespace TrekSt\Modules\Categories\Repositories\Frontend;


use TrekSt\Modules\Categories\Models\CategoriesTranslating;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Languages\Models\Language;

class CategoriesRepository
{
    protected $baseModel;
    public function __construct(  )
    {

        $this->baseModel = new Category();
        $this->languageModel = new Language();
        /**
        @var $this->translatingModel \TrekSt\Modules\News\Models\NewsTranslating;
         */
        $this->translatingModel = new CategoriesTranslating();
    }



    public function get(int $id)
    {
        return $this->baseModel->findOrFail($id);
    }



    public function getChildrenCategory(int $id)
    {
        return $this->baseModel->newQuery()->published()->where('parent_id',$id )->with('trans')->get();
    }











}
