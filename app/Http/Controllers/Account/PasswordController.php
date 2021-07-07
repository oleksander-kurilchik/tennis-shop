<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Account\Profile\ChangePasswordRequest;
use App\Http\Requests\Frontend\Account\Profile\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PasswordController extends Controller
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
    public function showEditForm(Request $request)
    {
        $user = Auth::guard('frontend')->user();
        return view('frontend.account.user.change_password', compact('user'));
    }





    public function changePassword(ChangePasswordRequest $request){
        $user = Auth::guard('frontend')->user();
        $user->password = bcrypt($request->password);
        $user->save();
        \Session::flash('flash_user_message_success', trans('profile.change-password.password_changed'));
        return back();
    }
}
