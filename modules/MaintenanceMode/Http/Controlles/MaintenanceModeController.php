<?php

namespace TrekSt\Modules\MaintenanceMode\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Validator;
use Artisan;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;

class MaintenanceModeController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:maintenance_mode.index')->only(['index','toggleMode']);

    }


    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.maintenance_mode.index');
        return $this->view('admin.maintenance_mode.index' );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function toggleMode()
    {
        if (app()->isDownForMaintenance())
        {
            Artisan::call('up');
            Session::flash('flash_message', "Сайт в нормальному режимі" );
        }
        else{
            Artisan::call('down');
            Session::flash('flash_warning', "Сайт в режимі обслуговування" );
        }

        return back();
    }





}
