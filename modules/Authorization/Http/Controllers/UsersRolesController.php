<?php

namespace TrekSt\Modules\Authorization\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use TrekSt\Modules\Authorization\Http\Requests\RolePermissionsStoreRequest;
use TrekSt\Modules\Authorization\Http\Requests\RolesDeleteRequest;
use TrekSt\Modules\Authorization\Http\Requests\UserRolesStoreRequest;
use TrekSt\Modules\Authorization\Repositories\Admin\PermissionsRepository;
use TrekSt\Modules\Authorization\Repositories\Admin\RolesPermissionsRepository;
use TrekSt\Modules\Authorization\Repositories\Admin\RolesRepository;
 use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\BackendUsers\Models\BackendUser;
use TrekSt\Modules\Filters\Http\Requests\RolesStoreRequest;


class UsersRolesController extends AdminBaseController
{
//    use FilterBreadcrumbs;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:backend_users.edit')->only(['index','update' ]);
        $this->rolesRepository = new RolesRepository();

    }

    public function index($users_id,Request $request)
    {

        $user = BackendUser::findOrFail($users_id);
        $roles = $this->rolesRepository->all();
        $user->load('roles');
        $items_values_arr = $user->roles->pluck('id')->toArray();


        $this->setCurrentBreadcrumbs('admin.users_roles.edit',$user);
        return $this->view('admin.authorization.users_roles.index', compact('user','roles','items_values_arr'));
    }

    public function update($users_id,UserRolesStoreRequest $request)
    {
        if($request->roles === null){
            $request->roles = [];
        }
       /** @var   BackendUser $user */
        $user = BackendUser::findOrFail($users_id);

        $roles = $this->rolesRepository->getQuery()->whereIn('id',$request->roles)->get();
        $user->syncRoles($roles);

        Session::flash('flash_message', 'Ролі користувача оновлено!');
        return back();
    }



}
