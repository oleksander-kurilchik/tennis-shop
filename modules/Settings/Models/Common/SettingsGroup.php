<?php

namespace  TrekSt\Modules\Settings\Models\Common;

use Illuminate\Database\Eloquent\Model;

class SettingsGroup extends Model
{
    protected $table = 'settings_groups';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'alias','order'];

    public function settings()
    {
        return $this->hasMany(Settings::class, 'settings_groups_id');
    }


}
