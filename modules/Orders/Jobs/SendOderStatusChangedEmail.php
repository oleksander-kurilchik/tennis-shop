<?php

namespace TrekSt\Modules\Orders\Jobs;

use TrekSt\Modules\Orders\Mail\OrderStatusChanged;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class SendOderStatusChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order;
    protected $statusFrom;
    protected $statusTo;
    public function __construct($order,$statusFrom,$statusTo)
    {
        $this->order = $order;
        $this->statusFrom = $statusFrom;
        $this->statusTo = $statusTo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->order->load(["products", "products.product.logo", "prices", "products.prices"]);
        Mail::to($this->order->email,'Замовлення - статус змінено')->send(new OrderStatusChanged($this->order,$this->statusFrom,$this->statusTo));
    }
}
