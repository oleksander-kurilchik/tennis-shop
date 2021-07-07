<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 19:20
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


use App\Classes\ExtClass;
use Illuminate\Database\Eloquent\Model;

class LandingPageItemParallax implements ILandingPageItem
{
    protected  $value = 0;
    protected  $view = 'frontend.landing_pages.items.parallax';

    public function setValue($item)
    {
        $this->item = $item;
        return $this;

    }

    public function render()
    {
        $parralax = $this->getDecodedValue();
        if(!$parralax){return;}
         return view($this->view,['item'=>$this->item,'parallax'=>$parralax])->render();
    }

    protected function getDecodedValue()
    {
        $jsonValue = json_decode($this->item->value,true);
        if(!$jsonValue){return;}
        $parallax = $this->getDefault();
        foreach($jsonValue as $key => $value){
            if ($value){
                $parallax->{$key} = $value;
            }
        }
     return $parallax;

    }
    protected function getDefault(){
        $parallax = new class() extends Model{} ;
        $parallax->image_src = '';
        $parallax->aligment = 'right';
        $parallax->enable_button = false;
        $parallax->scale = 1.1;
        $parallax->orientation = 'right';
        return $parallax;
    }
}
