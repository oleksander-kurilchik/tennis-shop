<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Account\Profile\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser;
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;
use TrekSt\Modules\Regions\Models\Country;
use TrekSt\Modules\Regions\Models\Region;

class WishListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');
        $this->productsRepository = new ProductsRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        $user = Auth::guard('frontend')->user();
        $query = $this->productsRepository->getQuery();
        $products =  $query->published()->whereIn('id',function ($query)use($user){
            $query->select('products_id')->from('wishlist')->where('users_id',$user->id);
        })->with(['trans','logo'])->get();



        return view('frontend.account.user.wishlist', compact('user','products'));
    }



}
