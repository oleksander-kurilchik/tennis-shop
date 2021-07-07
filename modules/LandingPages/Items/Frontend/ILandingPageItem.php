<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 18:35
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


interface ILandingPageItem
{

    public function setValue($value);
    public function render();


}
