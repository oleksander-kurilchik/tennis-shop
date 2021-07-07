<?php


namespace TrekSt\Modules\Products\Repositories\Frontend;


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

    public function getForCategoryQuery(int $categories_id)
    {
        return $this->baseModel->select('products.*')->whereIn('products.categories_id',function ($query) use ($categories_id){
            $query->select(['categories.id'])->from('categories')->
            join( 'categories as c1',function ($join){
                $join->on('categories._lft', '>=', 'c1._lft');
                $join->on('categories._lft', '<=', 'c1._rgt');

            } )->where('c1.id',$categories_id)->where('categories.published', true);
        })->published()->with(['trans','currency','logo']);
    }



    public function getMinMaxPriceForQuery($baseQuery){
        $cc = \CurrencyHandler::current();
        $currentCourse =  $cc->course;
         $query = clone $baseQuery;
           $query->select(\DB::raw(" min(products.price / currencies.course * {$currentCourse} )as min, max(products.price / currencies.course * {$currentCourse}  )as max"));
        if (!Product::hasJoin($query->getQuery(), 'currencies')) {
            $query->leftJoin('currencies', 'products.currencies_id', '=', 'currencies.id');
        }

        $minmax =  $query  ->first();
        if ($minmax->min === null) {
            $minmax->min = 0;
        }
        if ($minmax->max === null) {
            $minmax->max = 1;
        }
        return (object)
        ['min' => (int)$minmax->min, 'max' => (int)$minmax->max];
    }




    public function getProducts($products){
      return  $this->baseModel->newQuery()->published()->whereIn('id',$products)->with(['logo','trans'])->paginate(16);
    }


    public function getQuery(){
        return $this->baseModel->newQuery();
    }


    public function paginateSale(){
        return  $this->baseModel->newQuery()->where('sale',true)->published()->with(['logo','trans'])->paginate(16);
    }


    public function paginateNews(){
        return  $this->baseModel->newQuery()->where('news',true)->published()->with(['logo','trans'])->paginate(16);
    }



    public function paginateTop(){
        return  $this->baseModel->newQuery()->where('top',true)->published()->with(['logo','trans'])->paginate(16);
    }




}
