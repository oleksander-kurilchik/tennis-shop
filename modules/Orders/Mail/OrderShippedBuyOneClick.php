<?php

namespace TrekSt\Modules\Orders\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShippedBuyOneClick extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    public function __construct($order)
    {
        $this->order = $order;
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
         return $this->markdown('emails.orders.order_buy_one_click')
             ->with(["order"=>$this->order])
            ;
    }
}
