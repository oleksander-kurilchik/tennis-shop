<?php

namespace TrekSt\Modules\Feedback\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $feedback;
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
        $this->subject = "Запит на зворотній звязок № \"".$feedback->id. "\""  ;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.feedback.shipped',['feedback'=>$this->feedback]);
    }
}
