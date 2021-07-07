<?php

namespace TrekSt\Modules\Authorization\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use TrekSt\Modules\Authorization\Http\Requests\RolesDeleteRequest;
use TrekSt\Modules\Authorization\Http\Requests\RolesStoreRequest;
use TrekSt\Modules\Authorization\Repositories\Admin\RolesRepository;
 use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class RolesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('permission:roles.index')->only(['index']);
        $this->middleware('permission:roles.create')->only(['create','store']);
        $this->middleware('permission:roles.edit')->only(['edit','update','passwordForm','changePassword']);
        $this->middleware('permission:roles.delete')->only(['delete']);
        $this->rolesRepository = new RolesRepository();

    }

    public function index(Request $request)
    {
        $roles = $this->rolesRepository->paginateIndex();
        $this->setCurrentBreadcrumbs('admin.roles.index');
        return $this->view('admin.authorization.roles.index', compact('roles'));
    }

    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.roles.create');
        return $this->view('admin.authorization.roles.create' );
    }

    public function store(RolesStoreRequest $request)
    {
        $requestData = $request->validated();
        $role = $this->rolesRepository->create($requestData);
        Session::flash('flash_message', 'Роль створено!');
        return redirect(route("admin.roles.edit", ["id" => $role->id]));
    }

    public function show($id)
    {
        $role = $this->rolesRepository->get($id);
        $this->setCurrentBreadcrumbs('admin.roles.show',$role);
        return $this->view('admin.authorization.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = $this->rolesRepository->getForEdit($id);
        $this->setCurrentBreadcrumbs('admin.roles.edit',$role);
        return $this->view('admin.authorization.roles.edit', compact('role'));
    }


    public function update($id, RolesStoreRequest $request)
    {
        $requestData = $request->validated();
        $role = $this->rolesRepository->updateById($id,$requestData);
        Session::flash('flash_message', 'Роль оновлено!');
        return redirect(route("admin.roles.edit", ["id" => $role->id]));
    }


    public function destroy($id,RolesDeleteRequest $request)
    {

        $this->rolesRepository->deleteById($id);
        Session::flash('flash_message', 'Роль видалено!');
        return redirect(route("admin.roles.index"));
    }


}
