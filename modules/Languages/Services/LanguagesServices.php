<?php


namespace TrekSt\Modules\Languages\Services;


use TrekSt\Modules\Languages\Models\Language;

class LanguagesServices
{
    protected static $instance = null;
    protected $locale = null;
    protected $current = null;
    protected $all = null;


    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|null|static[]
     */
    public function getAll()
    {
        return $this->all;
    }
    /**
     * @return int|mixed
     */
    public function langId()
    {
        return $this->current->id;
    }
    public function __construct()
    {
        $this->all = \Cache::remember('LanguagesServices', 60*60*24, function()
        {
            return Language::query()->get();
        });

        $current_lang = app()->getLocale();
        $this->current = $this->all->firstWhere('code' ,$current_lang );
        if (!$this->current ){
            $this->current =$this->all->first();
        }
        $this->locale = $this->current->value;
        $this->locale_id = $this->current->id;

    }
    public function getLocale()
    {
        return $this->locale;
    }




}
