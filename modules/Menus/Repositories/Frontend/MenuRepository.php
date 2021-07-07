<?php


namespace TrekSt\Modules\Menus\Repositories\Frontend;


use TrekSt\Modules\Menus\Models\Menu;
use TrekSt\Modules\Menus\Models\MenuItem;

class MenuRepository
{
    protected $menuModel;
    protected $menuItemModel;

    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->menuItemModel = new MenuItem();

    }

    public function getMenu($slug)
    {

        $menuItems = \Cache::remember('menu_'.$slug .'__'. app()->getLocale(), 10*60*60, function () use ($slug) {
            return  Menu::where('slug',$slug)->with(['rootItems'=>function($query){
                $query->orderBy('order')->where('published',true);
            }])->firstOrFail()->rootItems;
        });



        return $menuItems;
    }




}
