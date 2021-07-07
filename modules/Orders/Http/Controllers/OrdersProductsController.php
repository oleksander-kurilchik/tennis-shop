<?php

namespace TrekSt\Modules\Orders\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use TrekSt\Modules\Order\Http\Requests\Admin\AddProductRequest;
use TrekSt\Modules\Order\Http\Requests\Admin\ChangeOrdersProductCountRequest;
use TrekSt\Modules\Orders\Jobs\SendOderStatusChangedEmail;
use TrekSt\Modules\Orders\Jobs\SendOderToUserEmail;
use TrekSt\Modules\Orders\Mail\OrderShipped;
use TrekSt\Modules\Orders\Models\OrdersPrice;
use TrekSt\Modules\Orders\Models\OrdersProductsPrice;
use TrekSt\Modules\Orders\Repositories\Admin\OrderRepository;
use TrekSt\Modules\Orders\Repositories\OrderProductRepository;
use TrekSt\Modules\Orders\Services\OrderProductService;
use TrekSt\Modules\Orders\Services\OrderService;
use TrekSt\Modules\Products\Models\Admin\Currency;
use TrekSt\Modules\Orders\Models\Order;
use TrekSt\Modules\Orders\Models\OrdersProduct;
use TrekSt\Modules\Products\Models\Product;
use \TrekSt\Modules\FrontendUsers\Models\Admin\FrontendUser as User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Validator;
use Lang;
use Auth;
use Mail;

use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
class OrdersProductsController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->orderProductRepository = new OrderProductRepository();
        $this->orderRepository = new OrderRepository();
        $this->orderService = new OrderService(null);
        $this->orderProductService = new OrderProductService(null);

         $this->middleware('permission:orders.edit')->only(['changeQty','add','destroy']);


    }








    public function changeQty($id, ChangeOrdersProductCountRequest $request)
    {

        $orderProduct = OrdersProduct::findOrFail($id);
        $order = Order::findOrFail($orderProduct->orders_id);

        $orderProduct->quantity = $request->quantity;
        $orderProduct->save();
        $this->orderProductService->rebuilPrice($orderProduct);
        $this->orderService->refreshOrderPriceById($orderProduct->orders_id);
        return back();

    }


    public function add(  AddProductRequest $request)
    {

        $product = Product::findOrFail($request->orders_product_add);
        $orderProduct =  $this->orderProductRepository->addProduct($request->orders_product_add,$request->orders_id);
        $this->orderProductService->rebuilPrice($orderProduct);
        $this->orderService->refreshOrderPriceById($request->orders_id);
        Session::flash('flash_message', 'Товар до замовлення додано');
        return back();
    }


    public function destroy($id)
    {
        $orderProduct = OrdersProduct::findOrFail($id);
        $order_id = $orderProduct->orders_id;
        $order = Order::findOrFail($order_id);
        if (!$order->canEdit()) {
            Session::flash('flash_warning',
                'Замовлення лише в статусі  \'' . trans('order.status.1') . "' дозволяється редагувати");
            return back();
        }
        $orderProduct->delete();


        $this->orderProductService->rebuilPrice($orderProduct);
        $this->orderService->refreshOrderPriceById($orderProduct->orders_id);

        Session::flash('flash_message', 'Товар із замовлення видалено');

        return back();
    }








}
