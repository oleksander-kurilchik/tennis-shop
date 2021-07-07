<?php

namespace TrekSt\Modules\FrontendUsers\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use Validator;
use App\Models\Admin\FrontendUser as User;
use Illuminate\Http\Request;
use \TrekSt\Modules\FrontendUsers\Http\Requests\UserRequest;
use TrekSt\Modules\FrontendUsers\Repositories\Admin\FrontendUsersRepository;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
class FrontendUsersController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->usersReposytory = new FrontendUsersRepository();

        $this->middleware('permission:frontend_users.index')->only(['index']);
        $this->middleware('permission:frontend_users.show')->only(['show']);
        $this->middleware('permission:frontend_users.edit')->only(['edit','update','order']);
        $this->middleware('permission:frontend_users.create')->only(['create','store']);
        $this->middleware('permission:frontend_users.delete')->only(['destroy']);
    }


    public function index(Request $request)
    {

        $queryArray = [];
        if (!empty($request->search)) {
            $queryArray['keyword'] = $request->search;
        }
        $this->setCurrentBreadcrumbs('admin.frontend_users.index');
        $users = $this->usersReposytory->paginateIndex($queryArray);
        return view('admin.frontend_users.index', compact('users'));
    }


    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.frontend_users.create');
         return view('admin.frontend_users.create'  );
    }


    public function store(UserRequest $request)
    {
        $requestData = $request->validated();
         $user = $this->usersReposytory->create($requestData);
        Session::flash('flash_message', 'Користувача створено!');
        return redirect(route('admin.frontend_users.edit', ['id' => $user->id]));
    }

    public function show($id)
    {
        $user = $this->usersReposytory->get($id);
        $this->setCurrentBreadcrumbs('admin.frontend_users.show',$user);
        return view('admin.frontend_users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->usersReposytory->getForEdit($id);

        $this->setCurrentBreadcrumbs('admin.frontend_users.edit',$user);
        return view('admin.frontend_users.edit', compact('user' ));
    }

    public function update($id, UserRequest $request)
    {
        $requestData = $request->validated();

        $user = $this->usersReposytory->updateById($id,$requestData);
        Session::flash('flash_message', 'Дані користувача змінено!');
        return back();
    }

    public function destroy($id, Request $request)
    {
        $user = $this->usersReposytory->deleteById($id);
        $user->delete();
        Session::flash('flash_message', 'Користувача видалено!');
        return redirect(route('admin.frontend_users.index'));
    }


}
