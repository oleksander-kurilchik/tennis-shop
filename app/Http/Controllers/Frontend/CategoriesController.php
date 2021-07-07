<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\CategoryRangeHandler;
use App\Classes\FilterTagsHandler;
use App\Classes\GetFilterFromQuery;
use App\Classes\GetSelectedCategories;
use App\Classes\ProductCategoriesFilterHandler;
use App\Classes\ProductFilterHandler;
use App\Classes\ProductPriceFilterHandler;
use App\Classes\ProductSortingHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Categories\Repositories\Frontend\CategoriesRepository;
use TrekSt\Modules\Filters\Models\FiltersValue;
use TrekSt\Modules\Filters\Repositories\Frontend\FrontendFiltersRepository;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->filtersRepository = new  FrontendFiltersRepository();
        $this->categoriesRepository = new  CategoriesRepository();
        $this->productsRepository = new  ProductsRepository();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request, $slug)
    {
        $category = Category::published()->where('slug', $slug)->firstOrFail();
        $subCategories = $this->categoriesRepository->getChildrenCategory($category->id);
        $productsQuery =  $this->productsRepository->getForCategoryQuery($category->id);
        $filters = $this->filtersRepository->getAvailableFiltersForCaterory($category->id);
        $selectedFilters = GetFilterFromQuery::getFilters($request->input("filters"));
        $selectedCategories = GetSelectedCategories::get($subCategories, $request->input("categories"));

        ///////////////////////
        $subCategories->transform(function ($item, $key) use ($selectedCategories) {
            if($selectedCategories->contains($item->id)){
                $item->checked = true;
            }
            return $item;
        });
//         if ($selectedCategories->isNotEmpty()){
//             $productsQuery->whereIn('categories')
//         }



        (new ProductCategoriesFilterHandler)->handle($productsQuery, $subCategories );



       $filterHandler = new ProductFilterHandler();
       $filterHandler->handle($productsQuery, $selectedFilters);




        foreach ($filters as $filter) {
            foreach ($filter->values as $filter_value) {
                $pos = array_search($filter_value->id, $selectedFilters);
                if ($pos !== false) {
                    $filter_value->checked = true;
                    unset($selectedFilters[$pos]);
                    $filter->expanted = true;
                }
            }
        }

 ///////////////////////////////////////////
        ProductSortingHandler::sort($productsQuery, $request->sorting);

        $priceRange = CategoryRangeHandler::getInstance()->getPriceRange($productsQuery);
        ProductPriceFilterHandler::handle($productsQuery, $request->get('price-from'), $request->get('price-to'));

        $priceRange->type = 'price';
        $tagHandler = FilterTagsHandler::getInstance();
        $tagHandler->category = $category;
        $tagHandler->addRangeTags($priceRange);
        $tagHandler->addFiltersTags($filters);
        $tagHandler->addCategoriesTags($subCategories);
        $tagCollection = $tagHandler->getTagCollection();


        \Debugbar::info('Product min', $priceRange->min);
        \Debugbar::info('Product max', $priceRange->max);
        \Debugbar::info('Product ', $priceRange);


        $products = $productsQuery ->paginate(16);
         return view('frontend.catalog.index', compact('category','products','filters','subCategories', 'priceRange','tagCollection'));
    }
}
