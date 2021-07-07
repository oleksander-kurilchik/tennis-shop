<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Cache;


class MessageController extends Controller
{


    public function show(Request $request)
    {
//
        if($message= \Session::get('key', null))

        return view('frontend.products.search', compact('products' ));
    }


}
