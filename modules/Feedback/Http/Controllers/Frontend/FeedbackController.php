<?php

namespace TrekSt\Modules\Feedback\Http\Controllers\Frontend;

use App\Mail\CallbackMail;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Notification;
use TrekSt\Modules\Feedback\Mail\FeedbackShipped;
use TrekSt\Modules\Feedback\Models\Feedback;
use Session;


class FeedbackController extends Controller
{
    //


    public function send(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
//            'phone' => ['required', new CustomPhone()],
            'email' => ['required',  'email', 'max:255'],
            'description' => ['required', 'string', 'min:0', 'max:1000'],
//            'g-recaptcha-response' => 'required|captcha',
        ];
        $this->validate($request, $rules,[],trans('feedback.fields') );
        $requestData = $request->only('name', 'email',   'description','source');
        $feedback = new Feedback($requestData);
        $feedback->ip = $request->ip();
        $feedback->user_agent = $request->userAgent();
        $feedback->save();


       /* $botSender = new Sender([
            'name' => 'Новий запит',
        ]);
        $bot = new Bot(['token' => config('viber.api_token')]);
        $viberUsers = ViberUser::all();
        foreach ($viberUsers as $user) {
            try {
                $bot->getClient()->sendMessage(
                    (new \Viber\Api\Message\Text())
                        ->setSender($botSender)
                        ->setReceiver($user->users_id)
                        ->setText("Запит на звороній дзвінок №" . $feedback->id . "\" \n {$feedback->name} \n {$feedback->phone}")
                );
            } catch (\Exception $exception) {
                Log::error('CallbackController viber' . $exception->getMessage());
            }
        }


        Notification::route('turbosms', $request->phone)
            ->notify(new CallbackNotification(null));*/
//        Mail::to(config('site.mail_info'))->send(new FeedbackShipped($feedback));
        if ($request->ajax()) {
            return ['message' => trans('feedback.success.message'), 'title' => trans('feedback.success.title')];
        }
        Session::flash('flash_frontend_info_message', trans('feedback.success.message'));
        return back();
    }
}

