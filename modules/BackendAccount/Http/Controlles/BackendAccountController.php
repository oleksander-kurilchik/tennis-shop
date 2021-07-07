<?php

namespace TrekSt\Modules\BackendAccount\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\BackendAccount\Http\Requests\ChangePasswordRequest;
use TrekSt\Modules\BackendAccount\Http\Requests\ProfileUpdateRequest;
use Validator;
use Mail;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class BackendAccountController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();


    }


    public function show()
    {
        $user = \Auth::guard('backend')->user();

        $this->setCurrentBreadcrumbs('admin.backend_account.show');
        return $this->view('admin.backend_account.show', compact('user'));
    }


    public function edit()
    {
        $user = \Auth::guard('backend')->user();
        $this->setCurrentBreadcrumbs('admin.backend_account.edit');
        return $this->view('admin.backend_account.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data  = $request->validated();
        $user = \Auth::guard('backend')->user();
        $user->update($data);
        Session::flash('flash_message', 'Дані змінено!');
        return back();
    }

    public function editPassword()
    {
        $user = \Auth::guard('backend')->user();
        $this->setCurrentBreadcrumbs('admin.backend_account.change_password');
        return $this->view('admin.backend_account.change_password', compact('user'));
    }


    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = \Auth::guard('backend')->user();
        $user->password = bcrypt($request->password);
        $user->save();
        \Session::flash('flash_message', 'Пароль змінено');
        return back();
    }


}
