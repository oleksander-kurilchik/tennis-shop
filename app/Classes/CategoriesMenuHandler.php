<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 02.10.17
 * Time: 12:33
 */

namespace App\Classes;

 use Session;
use Cache;
use Request;
 use TrekSt\Modules\Categories\Models\Category;

 class CategoriesMenuHandler
{
    /* @var $instance  CategoriesMenuHandler */
    protected static $instance;

    /**
     * @return mixed
     */


    public static function getInstance(): CategoriesMenuHandler
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $this->init();
    }

    protected function init()
    {


    }

    public function getCategories()
    {
        $categories = Cache::remember('globalMenuCategory_' . app()->getLocale(), 10*60*60, function () {
            $categories = Category::published()->with([
                'trans',
                'childrens'=>function($query){
                    $query->orderBy('order')->orderBy('id');
                },
                'childrens.childrens'=>function($query){
                    $query->orderBy('order')->orderBy('id');
                },
                'childrens.trans',

                'childrens.childrens.trans',



//              'childrens.childrens.childrens.trans',
//              'childrens.childrens.childrens.childrens.trans',
//              'childrens.childrens.childrens.childrens.childrens.trans',
            ])->doesntHave('parent')->orderBy('order')->orderBy('id')->get();



            return $categories;
        });
//        $this->setActiveCategory($categories);
        return $categories;
    }




    protected function setActiveCategory($categories){
        $url = Request::url();

        foreach($categories as $item)
        {
            $compUrl = $item->url;
            if ($item->url == $url){
                $item->active = true;
                return true;
            }

            $status =  $this->setActiveCategory($item->childrens);
            if($status){
                $item->active = true;
                return true;
            }


        }



    }


}
