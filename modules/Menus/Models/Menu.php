<?php

namespace TrekSt\Modules\Menus\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Menus\Models\MenuItem;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['slug', 'name'];

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function rootItems()
    {
        return $this->hasMany(MenuItem::class, 'menu_id')->whereDoesntHave('parent');
    }

    public function delete()
    {
        foreach ($this->items as $item){
            $item->delete();
        }
        return parent::delete();
    }

}
