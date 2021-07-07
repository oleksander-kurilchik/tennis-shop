<?php

namespace TrekSt\Modules\Authorization\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use TrekSt\Modules\Authorization\Http\Requests\RolePermissionsStoreRequest;
use TrekSt\Modules\Authorization\Http\Requests\RolesDeleteRequest;
use TrekSt\Modules\Authorization\Repositories\Admin\PermissionsRepository;
use TrekSt\Modules\Authorization\Repositories\Admin\RolesPermissionsRepository;
use TrekSt\Modules\Authorization\Repositories\Admin\RolesRepository;
 use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Filters\Http\Requests\RolesStoreRequest;


class RolesPermissionsController extends AdminBaseController
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
        $this->middleware('permission:roles.edit')->only(['index','update' ]);
        $this->rolesRepository = new RolesRepository();
        $this->permissionsRepository = new PermissionsRepository();
        $this->rolePermissionReposytory = new RolesPermissionsRepository();

    }

    public function index($roles_id,Request $request)
    {


        $role = $this->rolesRepository->get($roles_id);
        $role->load('permissions');
        $items_values_arr = $role->permissions->pluck('id')->toArray();
        $permissions = $this->permissionsRepository->all()->sortBy('name');
        $this->setCurrentBreadcrumbs('admin.roles_permissions.edit',$role);
        return $this->view('admin.authorization.roles_permissions.index', compact('role','permissions','items_values_arr'));
    }

    public function update($roles_id,RolePermissionsStoreRequest $request)
    {
        if($request->permissions === null){
            $request->permissions = [];
        }

        $this->rolePermissionReposytory->syncPermissions($roles_id,$request->permissions);


        Session::flash('flash_message', 'Права оновлено!');
        return back();
    }



}
