<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 19:20
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


class LandingPageItemSlider implements ILandingPageItem
{
    protected  $value = 0;
    protected  $view = 'frontend.landing_pages.items.slider';

    public function setValue($item)
    {
        $this->item = $item ;
        return $this;

    }

    public function render()
    {
        $data = json_decode($this->item->value);
        $sliderType = $data->type;
        $slides = $data->slides;
        return view($this->view,['slides'=>$slides,'item'=>$this->item,'sliderType'=>$sliderType])->render();
    }
}
