<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Cart\CartAddRequest;
use App\Http\Requests\Frontend\Cart\CartSubmitRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Cart\ChangeCountRequest;
use App\Http\Requests\Frontend\Cart\DeleteFromCartRequest;
use App\Rules\CustomPhone;
use Illuminate\Http\Request;


use TrekSt\Modules\BackendUsers\Models\BackendUser;
use TrekSt\Modules\LandingPages\Models\LandingPage;
use TrekSt\Modules\Orders\Mail\OrderShipped;
use TrekSt\Modules\Orders\Mail\OrderShippedManager;
use TrekSt\Modules\Orders\Models\OrdersDelivery;
use TrekSt\Modules\Orders\Services\Frontend\CartService;
use TrekSt\Modules\Orders\Services\OrderService;
use TrekSt\Modules\Products\Models\Product;

class CartController extends Controller
{
    protected $cartService ;
    public function __construct()
    {
        $this->cartService = new CartService(new Product());
        $this->orderService  = new OrderService($this->cartService);
    }


    public function add(CartAddRequest $request)
    {
        $lastProduct = $this->cartService->addProductToCart($request->id, $request->count);
        $response = $this->cartService->response();
        return [
            'cart' => $response,
            'status' => 'true',
            'last' => $lastProduct
        ];
    }

    public function index()
    {
        $page = LandingPage::where('slug', 'cart')->firstOrFail( );
        $count = $this->cartService->getCount();
        if ($count === 0) {
            return view('frontend.cart.cart_empty',compact('page'));
        }
        $_showRecapcha = 1;
        return  view('frontend.cart.index', compact('_showRecapcha','page'));
    }


    public function orderSubmit(CartSubmitRequest $request)
    {
        if ($this->cartService->getCount() == 0) {
        return redirect(route('frontend.cart.index'));
        }
//        $this->validateWithBag('cartForm', $request, $this->orderSubmitRules());
//        $this->

      /*  $order = new Order();
        $this->orderService->fillOrderFromUser($order,\Auth::guard('frontend')->user());
        $this->cartService->fillOrderData($order);
        $order->save();*/
       /* $delivery = new OrdersDelivery($request->only([
            'delivery_method', 'city_id', 'city_id', 'warehouse_id', 'city_name', 'warehouse_name'
        ]));
        $delivery->orders_id = $order->id;
        $delivery->save();*/
//        $order = $this->orderService->createOrder();
        $orderData = $request->validated();
        $order = $this->orderService->createOrderFromCart($orderData);
        $delivery = new OrdersDelivery($request->only([
            'delivery_method', 'city_id', 'city_id', 'warehouse_id', 'city_name', 'warehouse_name'
        ]));
        $delivery->orders_id = $order->id;
        $delivery->save();

        $user = Auth::guard('frontend')->user();
        $managersMail = null;


        \Mail::to($order->email)->cc(config('site.mail_info'))
            ->send(new  OrderShipped($order));





         $this->cartService->clearCart();
        if ($request->ajax()) {
            $request->session()->flash('order_submit_id', $order->id);
            return [
                'status' => 'success',
                'message' => 'Ok order',
                'order' => $order->id
            ];
        }

         return view('frontend.cart.success',compact('order'));


    }

    public function changeCount(ChangeCountRequest $request)
    {
        $this->cartService->changeProductCount($request->cart_id, $request->count);
        $response = $this->cartService->response();
        return $response;
    }


    public function deleteFromCart(DeleteFromCartRequest $request)
    {
        $this->cartService->deleteItem($request->cart_id);
        $response = $this->cartService->response();
        return $response;
    }





    public function orderCompete(){
        if(!$order_id = \Session::get('order_submit_id',3 )){
            abort(404);
        }
        $page = LandingPage::where('slug', 'cart')->firstOrFail( );
        return view('frontend.cart.success',compact('page'));
    }

}
