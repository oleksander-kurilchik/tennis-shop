<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 19:20
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


class LandingPageItemImage implements ILandingPageItem
{
    protected  $value = 0;
    protected  $view = 'frontend.landing_pages.items.image';

    public function setValue($item)
    {
        $this->item = $item;
        return $this;

    }

    public function render()
    {
        return view($this->view,['item'=>$this->item])->render();
    }

    public function getImagePath(){

        return $this->item->value;
    }
}
