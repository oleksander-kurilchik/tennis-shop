<?php

namespace TrekSt\Modules\Orders\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Admin\Order;
use App\Models\Admin\OrdersService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Validator;
use Lang;
use Auth;
use Mail;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class OrdersServicesController extends  AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:orders.edit')->only(['create','store','edit','update','destroy']);

    }
    protected function registerBreadcrumbs():void
    {
        parent::registerBreadcrumbs();

    }

    public function create($orders_id)
    {
        $order   = Order::findOrFail($orders_id);
        $statuses = OrdersService::getStatusesForSelect();
        $this->setCurrentBreadcrumbs('admin.orders_services.create',$order);
        return $this->view('admin.orders_services.create',compact('order','statuses'));
    }

    public function store($orders_id, Request $request)
    {
        $order   = Order::findOrFail($orders_id);
        $requestData = $this->validate($request, $this->rules());
        $orderService = new OrdersService($requestData);
        $orderService->orders_id = $orders_id;
        $orderService->save();
        $orderService->rebuildPrice();
        $orderService->save();
        $order->rebuildAllPrice();

        Session::flash('flash_message', 'Поглуги додано!');
        return redirect(route('admin.orders_services.edit', ['id' => $orderService->id]));
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:2000'],
            'status' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function edit($id)
    {
        $orderService = OrdersService::findOrFail($id);
        $statuses = OrdersService::getStatusesForSelect();
        $order = $orderService->order;
        $this->setCurrentBreadcrumbs('admin.orders_services.edit',$orderService);
        return $this->view('admin.orders_services.edit', compact('orderService','order','statuses'));
    }

    public function update($id,Request $request)
    {

        $requestData = $this->validate($request, $this->rules());



        $orderService = OrdersService::findOrFail($id);
        $orderService->update($requestData);
        $orderService->rebuildPrice();
        $orderService->save();
        $orderService->order->rebuildAllPrice();

        Session::flash('flash_message', 'Послугу оновлено!');
        return back();
    }

    public function destroy($id)
    {
        OrdersService::findOrFail($id)->delete();
        Session::flash('flash_message', 'Послугу видалено!');
        return back();
    }


}
