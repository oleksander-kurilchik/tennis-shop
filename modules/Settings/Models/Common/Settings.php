<?php

namespace  TrekSt\Modules\Settings\Models\Common;

use Illuminate\Database\Eloquent\Model;
class Settings extends Model
{


    protected $table = 'settings';

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
    protected $fillable = ['key','name', 'value', 'settings_groups_id','input_type_settings','validation_rules','comment','order','input_type','editable','deleteable','languages_id'];





}
