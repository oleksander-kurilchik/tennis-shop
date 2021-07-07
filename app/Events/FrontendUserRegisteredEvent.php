<?php

namespace App\Events;

 use App\Mail\FrontendUserRegisterMail;
 use Illuminate\Broadcasting\InteractsWithSockets;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Auth\Events\Registered;
 use TrekSt\Modules\FrontendUsers\Models\FrontendUser;

 class FrontendUserRegisteredEvent
{


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function handle(Registered $event)
    {
//        if(!$event->user instanceof  FrontendUser){
//            return ;
//        }
//        \Mail::to(config('site.mail_user_registered_info'))->send(new FrontendUserRegisterMail($event->user));
    }
}
