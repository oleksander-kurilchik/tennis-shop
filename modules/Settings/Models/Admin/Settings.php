<?php

namespace TrekSt\Modules\Settings\Models\Admin;

use TrekSt\Modules\Settings\Models\Common\Settings as BaseSettings;
use Kyslik\ColumnSortable\Sortable;

class Settings extends BaseSettings
{

    use Sortable;

    public static function getInputTypes()
    {
        $inputTupes = [
            'text' => 'Текстове поле',
            'textarea' => 'Багаторядкове текстове поле',
            'laravel_file_manager_image' => 'Зображення з файлового менеджера',
            'ckeditor' => 'Ckeditor',
            'google_maps_coordinate' => 'Google Maps Координати',
            'json_form_to_json' => 'Форма на основі json',
        ];
        return $inputTupes;

    }

    public function canEdit()
    {
        return $this->editable == true;
    }

    public function canDelete()
    {
        return $this->deleteable == true;
    }

    public function settingsGroup(){
        return $this->belongsTo(SettingsGroup::class,'settings_groups_id')->withDefault();
    }
}
