<?php

namespace  TrekSt\Modules\BackendUsersLog\Login\Http\Controllers;

use App\Http\Requests;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use Illuminate\Http\Request;
use TrekSt\Modules\BackendUsersLog\Login\Models\BackendUsersLoginLog;
use Breadcrumbs;


class LoginLogController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:users_login_log.index')->only(['index']);


    }


    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.users_login_log.index');
        $keyword = $request->get('search');
        $perPage = 25;

        $users_log = BackendUsersLoginLog::query()->sortable();

        if (!empty($keyword)) {
            $users_log->where('user_name', 'LIKE', "%$keyword%")
                ->orWhere('user_email', 'LIKE', "%$keyword%");
        }
        $users_log =  $users_log->orderByDesc('id')->paginate($perPage);
        return $this->view('admin.users_login_log.index', compact('users_log'));
    }



}
