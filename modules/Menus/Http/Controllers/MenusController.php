<?php

namespace TrekSt\Modules\Menus\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Cache;
use TrekSt\Modules\Menus\Models\Menu;
use TrekSt\Modules\Menus\Http\Requests\MenusStoreRequest;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Menus\Models\MenuItem;


class MenusController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:menu.index')->only(['index']);
        $this->middleware('permission:menu.show')->only(['show']);
        $this->middleware('permission:menu.edit')->only(['edit','update']);
        $this->middleware('permission:menu.create')->only(['create','store']);
        $this->middleware('permission:menu.delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->setCurrentBreadcrumbs('admin.menus.index');
        $menus = Menu::all();
        return $this->view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setCurrentBreadcrumbs('admin.menus.create');
        return $this->view('admin.menus.create');
    }

    public function store(MenusStoreRequest $request)
    {
        $requestData = $request->all();
        $menu = Menu::create($requestData);

        Session::flash('flash_message', 'Пункт меню  створено!');
        Cache::flush();
        return redirect(route('admin.menus.edit', ['id' => $menu->id]));
    }


    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.menus.show',$menu);
        return $this->view('admin.menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->setCurrentBreadcrumbs('admin.menus.edit',$menu);
        return $this->view('admin.menus.edit', compact('menu'));
    }

    /**
     * @var MenusStoreRequest $request
     */
    public function update($id, MenusStoreRequest $request)
    {

        $requestData = $request->validated();
        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        Cache::flush();
        Session::flash('flash_message', 'Пункт меню  оновлено!');
        return back();
    }


    public function destroy($id, Request $request)
    {
        $menu = Menu::findOrFail($id);
       /*   if ($menu->hasChild()) {
            Session::flash('flash_warning', 'Не можливо видалити пункт меню  в якого є підменю');
            return back();
        }*/
        $menu->delete();
        Session::flash('flash_message', 'Меню видалено!');
        Cache::flush();
        return redirect(route('admin.menus.index'));
    }





}
