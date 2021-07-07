<?php

namespace TrekSt\Modules\Authorization\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use TrekSt\Modules\Authorization\Http\Requests\PermissionStoreRequest;
 use TrekSt\Modules\Authorization\Repositories\Admin\PermissionsRepository;
 use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class PermissionsController extends AdminBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:permissions.index')->only(['index']);
        $this->middleware('permission:permissions.create')->only(['create','store']);
        $this->middleware('permission:permissions.edit')->only(['edit','update','passwordForm','changePassword']);
        $this->middleware('permission:permissions.delete')->only(['delete']);
        $this->permissionsRepository = new PermissionsRepository();

    }

    public function index(Request $request)
    {
        $permissions = $this->permissionsRepository->paginateIndex();
        $this->setCurrentBreadcrumbs('admin.permissions.index');
        return $this->view('admin.authorization.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.permissions.create');
        return $this->view('admin.authorization.permissions.create' );
    }

    public function store(PermissionStoreRequest $request)
    {
        $requestData = $request->validated();
        $permission = $this->permissionsRepository->create($requestData);
        Session::flash('flash_message', 'Дозвіл створено!');
        return redirect(route("admin.permissions.edit", ["id" => $permission->id]));
    }

    public function show($id)
    {
        $permission = $this->permissionsRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.permissions.show',$permission);
        return $this->view('admin.authorization.permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = $this->permissionsRepository->getForEdit($id);
        $this->setCurrentBreadcrumbs('admin.permissions.edit',$permission);
        return $this->view('admin.authorization.permissions.edit', compact('permission'));
    }


    public function update($id, PermissionStoreRequest $request)
    {
        $requestData = $request->validated();
        $permission = $this->permissionsRepository->updateById($id,$requestData);
        Session::flash('flash_message', 'Дозвіл оновлено!');
        return redirect(route("admin.permissions.edit", ["id" => $permission->id]));
    }


    public function destroy($id)
    {
        $this->permissionsRepository->deleteById($id);
        Session::flash('flash_message', 'Дозвіл видалено!');
        return redirect(route("admin.permissions.index"));
    }


}
