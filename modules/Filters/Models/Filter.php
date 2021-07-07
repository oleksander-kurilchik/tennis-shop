<?php

namespace TrekSt\Modules\Filters\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use TrekSt\Modules\Categories\Models\Category;

class Filter extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'filters';

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
    protected $fillable = [
        'name',
        'order',
//        'slug',
        'published',
        'categories_id'];


    public function translating()
    {
        return $this->hasMany(FiltersTranslating::class,"filters_id");
    }
    public function category()
    {
        return $this->belongsTo(Category::class,"categories_id");
    }
    public function values()
    {
        return $this->hasMany(FiltersValue::class,"filters_id");
    }
    public function delete()
    {
        foreach ($this->values as $item)
        {
            $item->delete();
        }
        $this->translating()->delete();
        return parent::delete();
    }

    public static function boot()
    {

        parent::boot();
//        self::observe(new FiltersObserver());
    }

    public function trans()
    {
        return $this->hasOne(FiltersTranslating::class,"filters_id")
            ->where('languages_id', \FLang::langId())->withDefault();
    }



}
