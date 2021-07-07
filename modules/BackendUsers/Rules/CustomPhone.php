<?php


namespace App\Rules;
namespace TrekSt\Modules\BackendUsers\Rules;



class CustomPhone extends \LVR\Phone\Phone
{

    public function passes($attribute, $value)
    {
        return $this->isE164UK($value)  ;
    }
    protected function isE164UK($value)
    {
        $conditions = [];
        $conditions[] = strpos($value, "+") === 0;
        $conditions[] = strlen($value) == 13;
//        $conditions[] = strlen($value) <= 16;
        $conditions[] = preg_match("/[^\d+]/i", $value) === 0;
        return (bool) array_product($conditions);
    }

    public function message()
    {
        return trans('validation.e164');
    }


}
