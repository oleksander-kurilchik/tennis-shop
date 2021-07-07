<?php

namespace TrekSt\Modules\Orders\Jobs;

use TrekSt\Modules\Orders\Mail\OrderShippedBuyOneClick;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class SendOderToUserBuyOneClickEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->order->load(["products", "products.product.logo", "prices", "products.prices"]);
        Mail::to(config('site.mail_info'), 'Нове замовлення')
//            ->cc(config('site.mail_info'), 'Нове замовлення')
            ->send(new OrderShippedBuyOneClick($this->order));;
    }
}
