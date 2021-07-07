<?php

namespace TrekSt\Modules\Menus\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Cache;
use TrekSt\Modules\Menus\Models\MenuItem;
use TrekSt\Modules\Menus\Models\Menu;
use TrekSt\Modules\Menus\Http\Requests\MenuItemStoreRequest;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;


class MenuItemController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:menu.index')->only(['index']);
        $this->middleware('permission:menu.show')->only(['show']);
        $this->middleware('permission:menu.edit')->only(['edit','update','orderMenuItem',]);
        $this->middleware('permission:menu.create')->only(['create','store']);
        $this->middleware('permission:menu.delete')->only(['destroy']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($menu_id, Request $request)
    {

//        $menu = Menu::where('id',$menu_id) ->get();
        $menu = Menu::findOrFail($menu_id);
        $menuItems = MenuItem::doesntHave('parent')->where('menu_id',$menu_id)->orderBy('order')->get();
        $this->setCurrentBreadcrumbs('admin.menu_item.index',$menu);
        return $this->view('admin.menus.menu_item.index', compact('menuItems','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        $targetList = MenuItem::getTargetForSelect();
        $this->setCurrentBreadcrumbs('admin.menu_item.create',$menu);
        return $this->view('admin.menus.menu_item.create', compact('menu','targetList'));
    }

    public function store($menu_id,MenuItemStoreRequest $request)
    {
        $menu = Menu::findOrFail($menu_id);
        $requestData = $request->all();
        $menuItem = MenuItem::create($requestData);
        $menuItem->order = $menuItem->id ;
        $menuItem->save();

        Session::flash('flash_message', 'Пункт меню  створено!');
        Cache::flush();
        return redirect(route('admin.menu_item.edit', ['menu_id'=>$menu->id,'id' => $menuItem->id]));
    }


    public function show($menu_id,$id)
    {
        $menu = Menu::findOrFail($menu_id);
        $targetList = MenuItem::getTargetForSelect();

        $menuItem = MenuItem::findOrFail($id);
//        $this->setCurrentBreadcrumbs('admin.menu_item.show',$menuItem);
        return $this->view('admin.menus.menu_item.show', compact('menu','menuItem','targetList'));
    }

    public function edit($menu_id,$id)
    {
        $menu = Menu::findOrFail($menu_id);
        $menuItem = MenuItem::findOrFail($id);
        $targetList = MenuItem::getTargetForSelect();
         $this->setCurrentBreadcrumbs('admin.menu_item.edit',$menuItem);
        return $this->view('admin.menus.menu_item.edit', compact('targetList','menu', 'menuItem'));
    }

    public function update($menu_id,$id, MenuItemStoreRequest $request)
    {

        $requestData = $request->all();
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update($requestData);

        Cache::flush();
        Session::flash('flash_message', 'Пункт menu item  оновлено!');
        return back();
    }


    public function destroy($id, Request $request)
    {
        $menuItem = MenuItem::findOrFail($id);
        if ($menuItem->hasChild()) {
            Session::flash('flash_warning', 'Не можливо видалити пункт меню  в якого є підменю');
            return back();
        }
        $menuItem->delete();
        Session::flash('flash_message', 'Пункт меню видалено!');
        Cache::flush();
        return redirect(route('admin.menu_item.index'));
    }


    public function order($menu_id, Request $request)
    {
        $data = $request->all();
        $menuItemOrder = $request->input('order');
        $this->orderMenuItem($menuItemOrder, null);
        if ($request->ajax()) {
            return ['success' => true, 'message' => "Новий порядок збережено" ];
        }
        return back();
    }


    private function orderMenuItem(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem['id']);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem['children'])) {
                $this->orderMenuItem($menuItem['children'], $item->id);
            }
        }
        Cache::flush();
    }





}
