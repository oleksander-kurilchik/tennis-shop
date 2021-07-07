<?php

namespace TrekSt\Modules\Orders\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
use \TrekSt\Modules\FrontendUsers\Models\FrontendUser as User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Validator;
use Lang;
use Auth;
use Mail;

use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
class OrdersController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
        $this->orderProductRepository = new OrderProductRepository();

        $this->middleware('permission:orders.index')->only(['index']);
        $this->middleware('permission:orders.edit')->only(['edit','update','refreshOrderPrice','changeStatus']);
        $this->middleware('permission:orders.create')->only(['create','store','createNewOrder','storeNewOrder']);
        $this->middleware('permission:orders.delete')->only(['destroy']);
        $this->middleware('permission:orders.show')->only(['show']);
    }
    protected function registerBreadcrumbs():void
    {
        parent::registerBreadcrumbs();

    }




    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $orders = $this->orderRepository->paginateIndex(['keyword'=>$keyword]);
        $this->setCurrentBreadcrumbs('admin.orders.index');
        return $this->view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = $this->orderRepository->get($id);
        if ($order->revised != true) {
            $order->revised = true;
            $order->save();
        }
        $this->setCurrentBreadcrumbs('admin.orders.show',$order);
        return $this->view('admin.orders.show', compact('order'));
    }


    public function edit($id)
    {
        $order = $this->orderRepository->get($id);
        if ($order->revised != true) {
            $order->revised = true;
            $order->save();
        }
        $orderStatuses = Order::getStatusesForSelect();
        $order->load(['products', 'products.product', 'products.product.logo']);
        $this->setCurrentBreadcrumbs('admin.orders.edit',$order);
        return $this->view('admin.orders.edit', compact('order','orderStatuses'));
    }

    public function destroy($id)
    {
        $order = $this->orderRepository->deleteById($id);
         Session::flash('flash_message', 'Замовлення видалено!');
        return redirect(route('admin.orders.index'));
    }




    public function refreshOrderPrice($id)
    {
        $order = Order::findOrFail($id);
        if (!$order->canEdit()) {
            Session::flash('flash_warning',
                "Ордер лише в статусі  '" . trans('order.status.1') . "' дозволяється редагувати");
            return back();
        }
        (new OrderService($order,new OrdersPrice()))->refreshOrderPrice();
        Session::flash('flash_message', 'Замовлення перераховано');

        return back();
    }

    public function changeStatus($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => ['required', 'string', 'in:new_order,being_processed,canceled,confirmed,paid,complete,returned_for_revision']
        ]);
        if ($validator->fails()) {
            Session::flash('flash_warning', 'Статус замовлення не пройшов валідацію');
            return back();
        }
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        Session::flash('flash_message', 'Статус замовлення змінено');
        $order->save();
        return back();
    }


    public function createNewOrder()
    {
        $currencies = Currency::all();
        $this->setCurrentBreadcrumbs('admin.orders.create');
        return $this->view('admin.orders.create_new_order', compact('currencies'));
    }

    public function storeNewOrder(Request $request)
    {
        if ($request->users_id == 0) {
            $request->merge(['users_id' => null]);
        }
        $rules = [
            'name' => ['string', 'required', 'min:1', 'max:255'],
            'email' => ['string', 'required', 'min:1', 'max:255'],
            'phone' => ['string', 'required', 'min:1', 'max:255'],
            'manager' => ['string', 'nullable', 'min:1', 'max:255'],
            'user_message' => ['string', 'nullable', 'min:0', 'max:255'],
            'order_description' => ['string', 'nullable', 'min:0', 'max:255'],
            'currency_id' => ['integer', 'required', 'exists:currencies,id'],
            'users_id' => ['nullable', 'integer', 'exists:frontend_users,id'],
             //TODO: Fixid validation rule
        ];
        $this->validate($request, $rules);
        $order = new Order($request->all());
        $order->fillFromAdmin();
        $order->save();
        Session::flash('flash_message', 'Нове замовлення створено ');
        return redirect(route('admin.orders.edit', ['id' => $order->id]));

    }

    public function searchUsers(Request $request)
    {
        $search = $request->search;
        $users = User::where('first_name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->get();
        return [
            'success' => true,
            'data' => $users
        ];
    }

    public function resendOrderEmail($id)
    {
        $order = Order::findOrFail($id);
        if(!$order->delivery()->exists()){
            Session::flash('flash_warning', 'Заповніть будьласка доставку');
            return back();
        }
        dispatch(new SendOderToUserEmail($order));
        Session::flash('flash_message', 'Замовлення відправлено');
        return back();
    }


    public function showEmailView($id)
    {
        $order = $this->orderRepository->get($id);
         return new OrderShipped($order);
    }


}
