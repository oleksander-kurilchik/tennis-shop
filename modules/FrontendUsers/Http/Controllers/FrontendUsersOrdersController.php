<?php

namespace TrekSt\Modules\FrontendUsers\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use TrekSt\Modules\Orders\Repositories\Admin\OrderRepository;
use TrekSt\Modules\Regions\Models\Country;
use TrekSt\Modules\Regions\Models\Region;
use Validator;
use App\Models\Admin\FrontendUser as User;
use Illuminate\Http\Request;
use \TrekSt\Modules\FrontendUsers\Http\Requests\UserRequest;
use TrekSt\Modules\FrontendUsers\Repositories\Admin\FrontendUsersRepository;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
class FrontendUsersOrdersController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->usersRepository = new FrontendUsersRepository();
        $this->orderRepository = new OrderRepository();
        $this->middleware('permission:frontend_users.show')->only(['show']);
    }


    public function index($id,Request $request)
    {
        $user =  $this->usersRepository->get($id);
        $orders = $this->orderRepository->paginateIndex(['users_id'=>$id]);
        $this->setCurrentBreadcrumbs('admin.frontend_users.orders',$user);
        return view('admin.frontend_users.orders', compact('user','orders'));
    }



}
