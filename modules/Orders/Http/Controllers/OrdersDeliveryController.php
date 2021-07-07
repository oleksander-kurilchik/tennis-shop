<?php

namespace TrekSt\Modules\Orders\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\Orders\Models\Order;
use Validator;
use Lang;
use Auth;
use Mail;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;

class OrdersDeliveryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:orders.edit')->only(['edit','update']);
    }
    protected function registerBreadcrumbs():void
    {
        parent::registerBreadcrumbs();

    }



    public function edit($orders_id){
        $order = Order::findOrFail($orders_id);
        $delivery = $order->delivery()->firstOrNew([],['delivery_method'=>0]);
        $this->setCurrentBreadcrumbs('admin.orders_delivery.edit',$order,$delivery);
        return $this->view('admin.orders_delivery.edit', compact('order','delivery'));
    }

    public function update($orders_id,Request $request){
        $data =  $this->validate($request,[
            'delivery_method'=>['required','integer','min:1','max:5'],
            'city_id'=>['required_if:delivery_method,1,2,3','string'],
            'warehouse_id'=>['required_if:delivery_method,1,2,3,4','string'],
            'city_name'=>['required_if:delivery_method,1,2,3','string'],
            'warehouse_name'=>['required_if:delivery_method,1,2,3,4','string'],
        ]);

        $order = Order::findOrFail($orders_id);
        $delivery = $order->delivery()->firstOrCreate([],['delivery_method'=>0]);
        $delivery->update($data);
        Session::flash('flash_message_account', ' Информация про доставку изменена');
        return back();
    }


}
