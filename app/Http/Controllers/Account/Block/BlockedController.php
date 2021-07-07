<?php

namespace App\Http\Controllers\Account\Block;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
 use Illuminate\Http\Request;

class BlockedController extends Controller
{



    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $guard = 'frontend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');


    }

    public function showInactive(Request $request)
    {
        return !$request->user($this->guard)->isInActive()
            ? redirect(route('frontend.index'))
            : view('frontend.account.block.inactive');
    }

    public function showBlocked(Request $request)
    {
        return !$request->user($this->guard)->isBlocked()
            ? redirect(route('frontend.index'))
            : view('frontend.account.block.blocked');
    }

}
