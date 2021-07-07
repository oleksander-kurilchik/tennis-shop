<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\LandingPages\Models\LandingPage;
use TrekSt\Modules\MainSlider\Repositories\Frontend\MainSliderRepository;
use TrekSt\Modules\Products\Models\Product;
use View;

class LandingPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders =  (new MainSliderRepository)->getForMainPage();
        $page = LandingPage::with(['trans'])->where('slug', 'index')->firstOrFail();
//
//        $categories = Category::query()->published()->whereNull('parent_id')->with(['childrens'=>function($query){
//            $query->published();
//        },'childrens.trans','trans','logo',])->get();

        $productsNew = Product::published()->where('new',true)->limit(30)->with(['trans','logo'])->get();
        $productsSale = Product::published()->where('sale',true)->limit(30)->with(['trans','logo'])->get();
        $productsTop = Product::published()->where('top',true)->limit(30)->with(['trans','logo'])->get();

        return view('frontend.landing_pages.index', compact('sliders','productsNew','productsSale','productsTop','page'));
    }





    public function show($alias)
    {
        $view = 'frontend.landing_pages.show';
        $page = LandingPage::published()->with(['trans','items'=>function($query){
            $query->where('published',true)->where('languages_id', \FLang::langId())
            ->orderBy('order')

            ;
        }])->where('slug', $alias)->firstOrFail();
        \Breadcrumbs::register('frontend.landing_pages.show', function ($breadcrumbs) use($page) {
            $breadcrumbs->parent('frontend.index');
            $breadcrumbs->push($page->trans->title , $page->url);
        });

        if (View::exists('frontend.landing_pages.'.$alias))
        {
            $view =  'frontend.landing_pages.'.$alias;
        }

        if ( method_exists ( $this , 'hook'.ucwords($alias) ))
        {
            $this->{'hook'.ucwords($alias)}();
        }



        return view($view, compact("page"));
    }



}
