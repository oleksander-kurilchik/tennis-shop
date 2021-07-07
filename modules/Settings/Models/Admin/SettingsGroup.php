<?php

namespace TrekSt\Modules\Settings\Models\Admin;

use TrekSt\Modules\Settings\Models\Common\SettingsGroup as BaseSettingsGroup;

class SettingsGroup extends BaseSettingsGroup
{

    public static function getForSelect()
    {
        return self::all()->pluck('name', 'id')->toArray();
    }

}
