<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class Published implements Rule
{
    protected $table;
    protected $field;

    /**
     * Create a new rule instance.
     * @param string $table
     * @param string $field
     * @return void
     */
    public function __construct($table, $field = 'id')
    {
        $this->table = $table;
        $this->field = $field;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$value) {
            return false;
        }
        return DB::table($this->table)->where($this->field, $value)->where('published', true)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.published');
    }
}
