<?php

namespace TrekSt\Modules\RobotsTxt\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Session;
use Breadcrumbs;
use Storage;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class RobotsTxtController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:robots_txt.edit')->only('edit','update');
    }

    public function edit(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.robots_txt.edit');
        if(!Storage::disk('web_root')->exists('robots.txt')){
            Storage::disk('web_root')->put('robots.txt', '');
        }

        $robots_txt = Storage::disk('web_root')->get('robots.txt');
        return $this->view('admin.robots_txt.edit', compact('robots_txt'));
    }

    public function update(Request $request)
    {
        $this->validate($request,['robots_txt'=>['required','string']]);
        $robots_txt = $request->robots_txt;
        Storage::disk('web_root')->put('robots.txt', $robots_txt);
        Session::flash('flash_message', 'robots.txt Змінено!');
        return back();
    }





}
