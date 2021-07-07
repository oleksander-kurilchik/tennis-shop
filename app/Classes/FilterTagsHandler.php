<?php


namespace App\Classes;


use Illuminate\Database\Eloquent\Model;

class FilterTagsHandler
{
    /* @var $instance  FilterTagsHandler */
    protected static $instance;
    protected $tagCollection;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTagCollection(): \Illuminate\Support\Collection
    {
        return $this->tagCollection;
    }

    public static function getInstance(): FilterTagsHandler
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $this->tagCollection = collect();
//        $this->category = $category;

    }
    public function addPriceTags($rangePrice){

        $this->addRangeTags($rangePrice);

    }

    public function addFiltersTags($filters){


        $filtered = $filters->filter(function ($item) {
            $values = $item->values;
            foreach ($values as $value) {
                if ($value->checked) {
                    return true;
                }
            }
            return false;
        })->values();

        foreach ($filtered as $filteredItem) {
            $tag = new class extends Model {
            };
            $tag->items = collect();
            $tag->title = $filteredItem->trans->title;
            foreach ($filteredItem->values as $valueItem) {
                if (!$valueItem->checked) {
                    continue;
                }

                $item = new class extends Model {
                };
                $item->title = $valueItem->trans->title;
                $getFilters = request()->get('filters');
                $getFiltersExplode = explode('-', $getFilters);
                if (($key = array_search($valueItem->id, $getFiltersExplode)) !== false) {
                    unset($getFiltersExplode[$key]);
                }
                $filterQuery = implode('-', $getFiltersExplode);

                $item->url = route('frontend.categories.show',
                    array_merge(['slug' => $this->category->slug, 'filters' => $filterQuery], request()->except('filters')));
                $tag->items [] = $item;

            }
            $this->tagCollection [] = $tag;
        }


    }




    public function addRangeTags($range){

        if ($range && !($range->start == $range->min && $range->end == $range->max)) {
            $tag = new class extends Model {
            };
            $tag->title = trans('category.'.$range->type);
            $tag->items = collect();
            $item = new class extends Model {
            };
            $item->title = $range->start.' – '.$range->end.' '.trans('category.range.'.$range->type);
            $item->url = route('frontend.categories.show',
                array_merge(['slug' => $this->category->slug], request()->except("{$range->type}-from", "{$range->type}-to")));
            $tag->items [] = $item;
            $this->tagCollection [] = $tag;
        }

    }



    public function addCategoriesTags($categories){
        $filtered = $categories->filter(function ($item) {
                if ($item->checked) {
                    return true;
                }
            return false;
        });
        if($filtered->isEmpty()){
            return;
        }
        $tag = new class extends Model {};
        $tag->items = collect();
        $tag->title = trans('category.sub_categories');
        foreach ($filtered as $filteredItem) {
            $item = new class extends Model {
            };
            $item->title = $filteredItem->trans->title;
            $getFilters = request()->get('categories');
            $getCategoriesExplode = explode('-', $getFilters);
            if (($key = array_search($filteredItem->id, $getCategoriesExplode)) !== false) {
                unset($getCategoriesExplode[$key]);
            }
            $filterQuery = implode('-', $getCategoriesExplode);

            $item->url = route('frontend.categories.show',
                array_merge(['slug' => $this->category->slug, 'categories' => $filterQuery], request()->except('categories')));
            $tag->items[] = $item;
        }
        $this->tagCollection [] = $tag;
    }








    public function handle($rangeFilters, $filters, $category)
    {

//        $this->tagCollection = collect();
//
//        if ($rangeFilters->price && $rangeFilters->price->start != $rangeFilters->price->min && $rangeFilters->price->end != $rangeFilters->price->max) {
//            $tag = new class extends Model {
//            };
//            $tag->title = trans('category.price');
//            $tag->items = collect();
//            $item = new class extends Model {
//            };
//            $item->title = $rangeFilters->price->start.' – '.$rangeFilters->price->end.' грн';
//            $item->url = route('frontend.categories.show',
//                array_merge(['slug' => $category->slug], request()->except('price-from', 'price-to')));
//            $tag->items [] = $item;
//            $this->tagCollection [] = $tag;
//        }

//
//        $filtered = $filters->filter(function ($item) {
//            $values = $item->values;
//            foreach ($values as $value) {
//                if ($value->checked) {
//                    return true;
//                }
//            }
//            return false;
//        })->values();
//
//        foreach ($filtered as $filteredItem) {
//            $tag = new class extends Model {
//            };
//            $tag->items = collect();
//            $tag->title = $filteredItem->trans->title;
//            foreach ($filteredItem->values as $valueItem) {
//                if (!$valueItem->checked) {
//                    continue;
//                }
//
//                $item = new class extends Model {
//                };
//                $item->title = $valueItem->trans->title;
//                $getFilters = request()->get('filters');
//                $getFiltersExplode = explode('-', $getFilters);
//                if (($key = array_search($valueItem->id, $getFiltersExplode)) !== false) {
//                    unset($getFiltersExplode[$key]);
//                }
//                $filterQuery = implode('-', $getFiltersExplode);
//
//                $item->url = route('frontend.categories.show',
//                    array_merge(['slug' => $category->slug, 'filters' => $filterQuery], request()->except('filters')));
//                $tag->items [] = $item;
//
//            }
//            $this->tagCollection [] = $tag;
//        }




        return $this->tagCollection;
    }





}
