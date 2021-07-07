<?php

namespace  TrekSt\Modules\Menus\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public const  TARGET_SELF = '_self';
    public const  TARGET_BLANK = '_blank';
    public const  TARGET_TOP = '_top';
    public const  TARGET_PARENT = '_parent';

    protected $fillable = ['parent_id', 'order', 'url_ru','target','menu_id', 'url_uk','url_en', 'title_uk', 'title_ru', 'title_en', 'published', 'name'];

    public static function getTargetForSelect(){
        return [
            self::TARGET_SELF =>'Загружает страницу в текущее окно.',
            self::TARGET_BLANK =>'Загружает страницу в новое окно браузер',
            self::TARGET_TOP =>'Отменяет все фреймы и загружает страницу в полном окне браузера',
            self::TARGET_PARENT =>'Загружает страницу во фрейм-родитель',
        ];
    }
    public function scopePublished($query)
    {
        $query->where('published',true)->orderBy('order');
    }


    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getUrlAttribute()
    {
        return $this->{'url_'.app()->getLocale()};
    }



    public function childrens()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }


    public function delete()
    {
        foreach ($this->childrens as $children){
            $children->delete();
        }
        return parent::delete();
    }


}
