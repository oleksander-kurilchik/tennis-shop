<?php

namespace App\Http\Controllers\Frontend;

use App\Classes\ExtClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Cache;
// use Breadcrumbs;
use TrekSt\Modules\Products\Models\Product;
use TrekSt\Modules\Products\Models\ProductsTranslating;

class ProductsSearchController extends Controller
{


    public function search(Request $request)
    {
//
//        $_page = LandingPage::where('slug', '_searchpage')->first();
//        if ($_page === null) {
//            $seoValue = new ExtClass(true);
//        } else {
//            $seoValue = $_page->trans;
//        }

        $searchQuery = $request->input('search');

        if(!empty($searchQuery)){
            $products = Product::published()->
                where(function ($query) use($searchQuery){
                    $query->orWhere('vendor_code','like',"%{$searchQuery}%");
                    $query->orWhereIn('id',function ($query)use($searchQuery){
                        $query->select('products_id')->from((new ProductsTranslating())->getTable())->
                        where('title','like',"%{$searchQuery}%");
                    });
                })->
                with(['trans', 'logo'])
                ->paginate(16);
        }
        else{
            $products = collect();
        }


        return view('frontend.products.search', compact('products' ));
    }


}
