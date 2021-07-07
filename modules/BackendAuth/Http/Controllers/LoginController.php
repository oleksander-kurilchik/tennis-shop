<?php

namespace TrekSt\Modules\BackendAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesBackendUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/admin";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route("admin.index");
        $this->middleware('guest:backend')->except('logout');
        $this->middleware('auth_backend')->only("logout");

    }
  protected function guard()
  {
    return Auth::guard('backend');
  }
}
