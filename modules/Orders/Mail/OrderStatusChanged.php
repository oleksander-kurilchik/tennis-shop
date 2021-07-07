<?php

namespace TrekSt\Modules\Orders\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    public function __construct($order,$statusFrom,$statusTo)
    {
        $this->order = $order;
        $this->subject = "";
        $this->statusFrom = $statusFrom;
        $this->statusTo = $statusTo;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject = 'Замовлення №'.$this->order->id. ' "'.config('app.name').'" статус змінено!' ;
         return $this->view('emails.orders.order_status_changed')
             ->with(['order'=>$this->order,'statusFrom'=>$this->statusFrom,'statusTo'=>$this->statusTo]);
    }
}
