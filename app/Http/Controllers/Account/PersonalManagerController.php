<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Mail\FrontendUserMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use TrekSt\Modules\BackendUsers\Models\BackendUser;
use TrekSt\Modules\FrontendUsers\Models\FrontendUsersMessage;

class PersonalManagerController extends Controller
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
        $user = Auth::guard('frontend')->user();
        $manager = BackendUser::query()->select(['backend_users.name_'.app()->getLocale().' as name','backend_users.phone','backend_users.email'])
            ->join('backend_users_regions_pivot','backend_users_regions_pivot.users_id','=','backend_users.id')
            ->join('frontend_users','backend_users_regions_pivot.regions_id','=','frontend_users.regions_id')
            ->where('frontend_users.id',$user->id)->first();
        if($manager){
            return view('frontend.account.user.personal-manager', compact('user','manager'));
        }

        abort(404);
     }


    public function sendMessage(Request $request){
        $this->validate($request,
            [
                'message'=>['required','string', 'min:5','max:1000']
            ]
        );

        $user = Auth::guard('frontend')->user();
        $manager = BackendUser::query()->select(['backend_users.id','backend_users.name_'.app()->getLocale().' as name','backend_users.phone','backend_users.email'])
            ->join('backend_users_regions_pivot','backend_users_regions_pivot.users_id','=','backend_users.id')
            ->join('frontend_users','backend_users_regions_pivot.regions_id','=','frontend_users.regions_id')
            ->where('frontend_users.id',$user->id)->first();

        $message = new FrontendUsersMessage();
        $message->users_id = $user->id;
        $message->message = $request->message;
        $message->source = $request->fullUrl();
        $message->ip = $request->ip();
        $message->lang = app()->getLocale();
        $message->user_agent = $request->userAgent();
        $message->managers_id =$manager->id;
        $message->save();

        \Mail::to($manager->email)->cc(config('site.mail_info'))->send(new FrontendUserMessageMail($user,$message));
//        \Mail::to('oleksandr.kurylchyk@gmail.com')->send(new FrontendUserMessageMail($user,$message));

        \Session::flash('flash_user_message_success', trans('profile.personal-manager.message_sent'));
         return  back();

    }


}
