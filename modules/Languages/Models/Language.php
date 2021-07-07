<?php

namespace TrekSt\Modules\Languages\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

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
    protected $fillable = ['name', 'value', 'is_default'];


    public static function getDefaultLanguage()
    {
      return self::orderBy("is_default","DESC")->firstOrFail();
    }

}
