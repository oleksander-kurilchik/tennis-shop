<?php


namespace TrekSt\Modules\BackendAuth\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use TrekSt\Modules\BackendUsers\Models\BackendUser;
use TrekSt\Modules\BackendUsersLog\Login\Models\BackendUsersLoginLog;
use Auth;
use Carbon\Carbon;

class LogSuccessfulLoginBackend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct( Request $request)
    {
        //
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        $debug =  10;

        if (Auth::guard("backend")->check())
        {

            $user =  $event->user;
            if( !$user instanceof  BackendUser){
                return;
            }
            $user_name = $user->name;
            $user_email = $user->email;
            $date   = Carbon::now();
            $ip = $this->request->ip();

            $user_log = new BackendUsersLoginLog();
            $user_log->user_name = $user_name;
            $user_log->user_email = $user_email;
            $user_log->login_time = $date;
            $user_log->ip = $ip;
            $user_log->save();

        }

    }
}
