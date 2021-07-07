<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\LandingPages\Models\LandingPage;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;
use TrekSt\Modules\ProductsAttributes\Repositories\Admin\ProductsAttributesPivotRepository;
use TrekSt\Modules\ProductsVariations\Repositories\Frontend\ProductsVariationsGroupsRepository;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');

        $this->pivotAttributeRepository = new ProductsAttributesPivotRepository();
        $this->productVariationRepository  = new   ProductsVariationsGroupsRepository();
        $this->productRepository = new ProductsRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request, $slug)
    {
        $product =  Product::query()->published()->where('slug',$slug)->firstOrFail();
        \LastViewedProducts::addProduct($product);
        $product->load(['trans','images'=>function($query){
            $query->orderBy('logo_status','desc')->orderBy('id');
        }]);
        $attributes =  $this->pivotAttributeRepository->getListValues($product->id);
        $product->attributes = $attributes;

        $additional = Product::query()->select(\DB::Raw('products.*,products.order  as rand_id '))
            ->where('products.categories_id', $product->categories_id);
        $additionalRandom = Product::query()->select(\DB::Raw('products.*, (RAND()+1) * 1000 as rand_id '))->published()->inRandomOrder();
        $similarProducts = $additional->union($additionalRandom) ->published()->orderBy('rand_id')->with(['logo','trans','currency'])->limit(30)->get();
        $variationGroups = $this->productVariationRepository->getGroupsWithProducts($product->id);
        return view('frontend.products.show', compact('product','attributes','similarProducts','variationGroups'));
    }








    public function sale(Request $request)
    {
        $page = LandingPage::where('slug', 'sale')->firstOrFail();
        $seoValue = $page->trans;
        $products =  $this->productRepository->paginateSale();
        return view('frontend.products.sale', compact('products', 'page'));
    }

    public function top(Request $request)
    {
        $page = LandingPage::where('slug', 'top')->firstOrFail();
        $seoValue = $page->trans;
        $products =  $this->productRepository->paginateTop();
        return view('frontend.products.top', compact('products', 'page'));
    }

    public function news(Request $request)
    {
        $page = LandingPage::where('slug', 'news')->firstOrFail();
        $seoValue = $page->trans;
        $products =  $this->productRepository->paginateNews();
        return view('frontend.products.news', compact('products', 'page'));
    }



}
