<?php

namespace TrekSt\Modules\AdminBase\Http\Controllers;

use App\Classes\ExtClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use Cache;
use Session;
use Breadcrumbs;
use Config;



class AdminBaseController extends Controller
{


    public function __construct()
    {
//          $this->_breadcrumbValue = new ExtClass();
        Config::set('breadcrumbs.view', 'admin.global.breadcrumbs');
    }

    protected $viewValue = array();
    protected $title = null;
      protected function view($view,array $value = null )
    {
        //$this->registerBreadcrumbs();

        if ($value !=null)
        {
            $this->viewValue  = array_merge( $this->viewValue, $value);
        }
        return view($view, $this->viewValue);

    }


    protected function registerBreadcrumbs():void
    {


    }
    protected function getTitleController():string{
        if ($this->title){
            return $this->title;
        }
        return get_class($this);
    }

    protected function breadcrumbsFor($name,$callback){
        Breadcrumbs::for($name, $callback);
    }
    protected function setCurrentBreadcrumbs($name ,$model = null):void{
        \View::share('_breadcrumb',$name);
        \View::share('_breadcrumbValue',$model);
    }
}
