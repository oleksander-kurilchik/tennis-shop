<?php

namespace TrekSt\Modules\WishList\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use TrekSt\Modules\Wishlist\Models\Wishlist;
use TrekSt\Modules\Wishlist\Repository\Admin\WishlistRepository;
use View;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = new WishlistRepository();

     }





    public function add(Request $request)
    {
        $this->validate($request,[
            'id'=>['required','exists:products,id', function ($attribute, $value, $fail) {
                if (!\DB::table('products')->where('id',$value)->where('published',true)->exists()) {
                    $fail('product not found');
                }
            } ]
        ]);
        $user = \Auth::guard('frontend')->user();
        $this->repository->create(['products_id'=>$request->id,'users_id'=>$user->id]);

        return ['success'=>true,'count'=>$this->repository->getCount($user->id)];

    }

    public function remove(Request $request)
    {
        $this->validate($request,[
            'id'=>['required','integer']
        ]);
        $user = \Auth::guard('frontend')->user();
        $this->repository->remoreForUser($user->id,$request->id);

        return ['success'=>true,'count'=>$this->repository->getCount($user->id)];

    }








}
