<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HankakuRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $convertedValue = mb_convert_kana($value, 'n');
        return $convertedValue === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attributeは数字を全角で入力しないでください。';
    }
}
