<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Session;
use TrekSt\Modules\Orders\Models\Order;
use TrekSt\Modules\Orders\Repositories\Account\OrdersRepository;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
use TrekSt\Modules\Orders\Services\OrderXlsxService;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:frontend');



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        $user = Auth::guard('frontend')->user();
        $this->ordersRepository = new OrdersRepository($user->id);
//        $status =  (string) $request->status;
        $ordersActual =  $this->ordersRepository->paginateActual();
        $ordersComplete =  $this->ordersRepository->paginateComplete();
        return view('frontend.account.user.order-history', compact('user' ,'ordersActual','ordersComplete'));
    }









}
