<?php


namespace App\Rules;


class CustomPhone extends \LVR\Phone\Phone
{

//    public function passes($attribute, $value)
//    {
//        return $this->isE164UK($value)  ;
//    }

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
        $conditions[] = preg_match("/^[+]{1}380[1-9]{1}[0-9]{8}$/i", $value) === 1;
        return (bool) array_product($conditions);
    }

    public function message()
    {
        return trans('validation.e164');
    }


}
