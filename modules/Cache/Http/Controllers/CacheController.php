<?php

namespace TrekSt\Modules\Cache\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Validator;
use Cache;

class CacheController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\View\View
   */
  public function __construct()
  {
      $this->middleware('permission:cache.index')->only('index','update');
  }

    public function index(Request $request)
  {
      Cache::flush();
      Session::flash('flash_message', "Кеш очишено" );

    return back();
  }




}
