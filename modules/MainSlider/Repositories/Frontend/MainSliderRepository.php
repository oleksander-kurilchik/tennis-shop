<?php


namespace TrekSt\Modules\MainSlider\Repositories\Frontend;


use TrekSt\Modules\Languages\Models\Language;
use TrekSt\Modules\MainSlider\Models\MainSlider;

class MainSliderRepository
{

    public function __construct(  )
    {
        $this->baseModel = new MainSlider();
        $this->languageModel = new Language;
    }

    public function getForMainPage( )
    {
        return $this->baseModel->newQuery()->published()->get();
    }




}
