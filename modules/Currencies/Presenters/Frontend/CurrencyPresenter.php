<?php


namespace TrekSt\Modules\Currencies\Presenters\Frontend;


class CurrencyPresenter
{

    protected $model;
    public function __construct($model)
    {
        $this->model = $model;

    }

    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->model->$key;
    }

    public function short_name(){
        return trans('currency.short_name.'.$this->model->code);
    }



}
