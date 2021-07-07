<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\LandingPages\Models\LandingPage;
use TrekSt\Modules\News\Models\News;
use TrekSt\Modules\Products\Models\Product;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = LandingPage::with(['trans'])->where('slug', 'news')->firstOrFail();

        $news = News::published()->simplePaginate(4);
        $news->load(['logo','trans']);
        $alias = 'news';
//        $page = LandingPage::where('slug', $alias)->firstOrFail( );
//        $page->url = route('frontend.news.index');

        return view('frontend.news.index', compact('news','page'));
    }

    public function show($slug)
    {

        $newsItem = News::published()->where('slug', $slug)->firstOrFail();
        return view('frontend.news.show', compact('newsItem'));
    }

}
