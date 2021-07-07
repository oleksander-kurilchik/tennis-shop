<?php
/**
 * Created by PhpStorm.
 * User: oleksandr
 * Date: 11.08.18
 * Time: 17:34
 */

namespace TrekSt\Modules\Currencies\Services;

use  TrekSt\Modules\Currencies\Models\Currency as CurrencyModel;
use Session;
use Cache;
use Auth;

class CurrencyServices
{
    protected $currentCurrency;
    protected $currencies;

    public function __construct()
    {
        $currencies = Cache::remember('Currency_currencies', 60*60*24, function () {
            return CurrencyModel::all();
        });
        $this->currencies = $currencies;
        $currentCurrencyCode = Session::get("currency", "uah");
        $this->currentCurrency = $this->currencies->firstWhere("code", $currentCurrencyCode);
        if (!$this->currentCurrency) {
            $this->currentCurrency = $this->currencies->first();
        }
    }

    public function current()
    {
        return $this->currentCurrency;
    }

    public function currentCode()
    {
        return $this->currentCurrency->code;
    }

    public function currentName()
    {
        return __("globals." . $this->currentCurrency->code);
    }

    public function setCurrent(string $code = "uah")
    {
        Session::put("currency", $code);
        $currency = $this->currencies->firstWhere("code", $code);
        if ($currency) {
            $this->currentCurrency = $currency;
            return $this->currentCurrency;
        }
    }

    public function getAllCurrency()
    {
        return $this->currencies;
    }

    public function isCurrent($currency)
    {
        return  $this->currentCurrency->id == $currency->id;
    }




}
