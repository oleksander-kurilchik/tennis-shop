<?php

namespace TrekSt\Modules\LandingPages\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\LandingPages\Items\Frontend\LandingPageItemFactory;


class LandingPagesItem extends Model
{

    protected $table = 'landing_pages_item';
    protected $primaryKey = 'id';
    protected $fillable = [  'landing_pages_id','languages_id','value','name','type','classes','styles','javascript','settings','order', 'published' ];




    public function getAdminNameAttribute()
    {
        $type = 'Undefined';
        switch ($this->type) {
            case'ckeditor':
                {
                    $type = 'Ckeditor';
                }
                break;
            case'ckeditor_w100':
                {
                    $type = 'Ckeditor 100% ширина';
                }
                break;
            case 'image':
                {
                    $type = 'Зображення';
                }
                break;
            case 'parallax_json':
                {
                    $type = 'Паралакс';
                }
                break;
            case 'slider_json':
                {
                    $type = 'Слайдер';
                }
                break;
            case 'raw_html':
                {
                    $type = 'Html';
                }
                break;
            case 'youtube':
                {
                    $type = 'Youtube';
                }
                break;
        }

        return "#{$this->id} - ".$type.' - '." \"{$this->name}\"";
    }



    public function render()
    {
        $item = LandingPageItemFactory::getItem($this->type);
        $item->setValue($this);
        return $item->render();
    }

    public function getItem(){
        $item = LandingPageItemFactory::getItem($this->type);
        $item->setValue($this);
        return $item;
    }


}
