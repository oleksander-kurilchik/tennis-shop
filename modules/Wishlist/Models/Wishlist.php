<?php

namespace TrekSt\Modules\Wishlist\Models;

use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Menus\Models\MenuItem;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'products_id'];



}
