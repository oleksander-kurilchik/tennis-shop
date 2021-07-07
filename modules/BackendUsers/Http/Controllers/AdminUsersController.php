<?php

namespace TrekSt\Modules\BackendUsers\Http\Controllers;

use Session;
use Auth;
use Redirect;
use TrekSt\Modules\BackendUsers\Http\Requests\ChangeBackendUserPasswordRequest;
use TrekSt\Modules\BackendUsers\Rules\CustomPhone;
use Validator;
use Hash;
use App\Http\Requests;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\BackendUsers\Models\BackendUser;
use Illuminate\Http\Request;

class AdminUsersController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();


        $this->middleware('permission:backend_users.index')->only(['index']);
        $this->middleware('permission:backend_users.create')->only(['create','store']);
        $this->middleware('permission:backend_users.edit')->only(['edit','update','passwordForm','changePassword']);
//        $this->middleware('permission:backend_users.edit')->only(['edit','update']);
        $this->middleware('permission:backend_users.delete')->only(['delete']);

    }


    public function index(Request $request)
    {
        $perPage = 25;
        $keyword = $request->get('search');
        $usersQuery = BackendUser::query()->sortable();
        if (!empty($keyword)) {
            $usersQuery->where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%");
        }
        $users = $usersQuery->paginate($perPage);
        $this->setCurrentBreadcrumbs('admin.backend_users.index');
        return $this->view('admin.backend_users.index',compact('users'));
    }
    public function show($id)
    {
        $user = BackendUser::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.backend_users.show',$user);
        return $this->view('admin.backend_users.show', compact('user'));
    }


    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.backend_users.create');
        return $this->view('admin.backend_users.create');
    }
    public function edit($id)
    {
        $user = BackendUser::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.backend_users.edit',$user);
        return $this->view('admin.backend_users.edit',compact('user'));
    }

    public function store(Request $request)
    {
          $this->validate($request, [
              'name' => 'required|string|min:4|max:255',
              'email' => 'required|email|unique:backend_users,email|min:4|max:255',
              'phone' => ['required','unique:backend_users,phone',new CustomPhone()],
              'user_password' => 'required|min:5,max:255',
//              'user_type' => ['required','in:admin,manager'],
              'user_password_repeat' => 'same:user_password',
          ]);
        $validatedData = $request->only(['name','email','phone','user_type']);
        $user = new BackendUser($validatedData);
        $user->password = bcrypt($request->user_password);
        $user->save();
        Session::flash('flash_message', 'Користувач створено!');
        return redirect(route("admin.backend_users.index"));
    }


    public function update($id,Request $request)
    {
        $user = BackendUser::findOrFail($id);
        $rules  = [ 'name' => ['required','string','min:4','max:255'],
            'phone' => ['required','unique:backend_users,phone,'.$id,new CustomPhone()],
            'name_uk' => ['required','max:255'],
            'name_ru' => ['required','max:255'],
            'name_en' => ['required','max:255'],
//            'user_type' => ['required','in:admin,manager']
        ];


        $this->validate($request, $rules);
        $validatedData = $request->only(['name','phone','name_uk','name_uk','name_ru','name_en',]);
        $user->update($validatedData);
        Session::flash('flash_message', 'Користувач оновлено!');
        return redirect(route('admin.backend_users.edit',['id'=>$user->id]));
    }



    public function passwordForm($id)
    {
        $user = BackendUser::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.backend_users.change_password',$user);
        return $this->view('admin.backend_users.change_password',compact('user'));
    }


    public function changePassword($id,ChangeBackendUserPasswordRequest $request)
    {
        $user = BackendUser::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('flash_message', 'Пароль змінено!');
        return back();
    }

    public function destroy($id)
    {
        $user = Auth::guard('backend')->user();
        if ($id == $user->id)
        {
            Session::flash('flash_warning', 'Неможливо видалити користувача з якого ви увышли в систему');
            return Redirect::back()->withErrors(['Неможливо видалити користувача з якого ви увышли в систему']);
        }
        BackendUser::destroy($id);
        Session::flash('flash_message', 'Користувач видалено!');
        return back();
    }
}
