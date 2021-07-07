<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FrontendUserMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    protected $message;
    public function __construct($user,$message)
    {
        //
        $this->user = $user;
        $this->message = $message;
        $this->subject = "Нове повідомлення від клієнта";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.frontend_users.message' )
            ->with(['user'=>$this->user,'user_message'=>$this->message]);
    }
}
