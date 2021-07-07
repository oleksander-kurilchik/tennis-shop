<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 19:20
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


class LandingPageItemFake implements ILandingPageItem
{
//    protected  $value = 0;
//    protected  $view = 'frontend.landing_pages.items.slider';

    public function setValue($value)
    {
//        $this->value = $value;
        return $this;

    }

    public function render()
    {
//        return '<div class="fake">fake<div>';
    }
}
