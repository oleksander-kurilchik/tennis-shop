<?php

namespace TrekSt\Modules\Orders\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShippedManager extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    protected $user;
    public function __construct($order,$user)
    {
        $this->order = $order;
        $this->user = $user;
        $this->subject = "";

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject = "Замовлення №".$this->order->id. " \"".config("app.name")."\"" ;
         return $this->markdown('emails.orders.order_to_manager')
             ->with(["order"=>$this->order,'user'=>$this->user])
            ;
    }
}
