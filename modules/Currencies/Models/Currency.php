<?php

namespace TrekSt\Modules\Currencies\Models;

use Cache;
use Illuminate\Database\Eloquent\Model;
use TrekSt\Modules\Currencies\Presenters\Frontend\CurrencyPresenter;

class Currency extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';




    public function getFrontAttribute(){
        if(!$this->frontendAttr){
            $this->frontendAttr = new CurrencyPresenter($this);
        }
        return  $this->frontendAttr;
    }





}
