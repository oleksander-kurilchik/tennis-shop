<?php

namespace TrekSt\Modules\AdminHome\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;

class AdminHomeController extends AdminBaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\View\View
   */
  public function index(Request $request)
  {
      $this->setCurrentBreadcrumbs('admin.index');
    return $this->view('admin.dashboard');
  }

  public function redirectAdmin()
  {
      return redirect(route("admin.index"));
  }



}
