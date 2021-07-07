<?php

namespace TrekSt\Modules\BackendUsers\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Traits\HasRoles;

class BackendUser extends Authenticatable
{
    protected $guard = 'backend';
    use Notifiable;
    use Sortable;
    use HasRoles;
    protected $table = 'backend_users';
    protected $fillable = [
        'name', 'email', 'password','phone','name_uk','name_ru','name_en'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin()
    {
        if ($this->user_type == 'admin' || $this->user_type == 'super_admin') {
            return true;
        }
        return false;
    }

}
