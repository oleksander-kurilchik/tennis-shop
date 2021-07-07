<?php

namespace TrekSt\Modules\Filters\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FiltersValue extends Model
{
    use Sortable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'filters_values';

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
        'slug',
        'published',
        'filters_id'];


    public function translating()
    {
        return $this->hasMany(FiltersValuesTranslating::class,"filters_values_id");
    }
    public function filter()
    {
        return $this->belongsTo(Filter::class,"filters_id");
    }
    public function products_values()
    {
        return $this->belongsTo(ProductsFilter::class,"filters_values_id");
    }

    public function delete()
    {
        $this->translating()->delete();
        $this->products_values()->delete();
        return parent::delete();
    }

    public static function boot()
    {

        parent::boot();
//        self::observe(new FiltersValuesObserver());
    }

    public function trans()
    {
        return $this->hasOne(FiltersValuesTranslating::class,"filters_values_id")
            ->where('languages_id', \FLang::langId())->withDefault();
    }

}
