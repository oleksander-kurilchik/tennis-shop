<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 16.03.19
 * Time: 18:34
 */

namespace TrekSt\Modules\LandingPages\Items\Frontend;


class LandingPageItemFactory
{

  public static function getItem($type):ILandingPageItem {
       switch ($type){
           case 'slider_json':{
               return new LandingPageItemSlider();
           }
           case 'ckeditor':{
               return new LandingPageItemCkeditor();
           }
           case 'ckeditor_w100':{
               return new LandingPageItemCkeditorW100();
           }
           case 'raw_html':{
               return new LandingPageItemHtml();
           }
           case 'iframe':{
               return new LandingPageItemIframe();
           }
           case 'parallax_json':{
               return new LandingPageItemParallax();
           }
           case 'image':{
               return new LandingPageItemImage();
           }
           case 'youtube':{
               return new LandingPageItemYoutube();
           }
           default:{
               return new LandingPageItemFake();
           }
       }
      return new LandingPageItemFake();
  }

}
