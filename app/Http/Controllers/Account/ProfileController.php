<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Account\Profile\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser;
use TrekSt\Modules\Regions\Models\Country;
use TrekSt\Modules\Regions\Models\Region;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
//        FrontendUser::resolveRelationUsing('country',function ($model){
//            return $model->belongsTo(Country::class, 'countries_id')->withDefault([]);
//        });
//        FrontendUser::resolveRelationUsing('region',function ($model){
//            return $model->belongsTo(Region::class, 'regions_id');
//        });

        $user = Auth::guard('frontend')->user();
        return view('frontend.account.user.show', compact('user'));
    }


    public function edit(Request $request)
    {
//        FrontendUser::resolveRelationUsing('country',function ($model){
//            return $model->belongsTo(Country::class, 'countries_id')->withDefault([]);
//        });
//        FrontendUser::resolveRelationUsing('region',function ($model){
//            return $model->belongsTo(Region::class, 'regions_id')->withDefault([]);
//        });


        $user = Auth::guard('frontend')->user();
        return view('frontend.account.user.edit', compact('user' ));
    }


    public function update(ProfileUpdateRequest $request){
        $user = Auth::guard('frontend')->user();
        $data  = $request->validated();
        $user->update($data);
        \Session::flash('flash_user_message_success', trans('profile.edit.data_changed'));
        return back();
    }
}
