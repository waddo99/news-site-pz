<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringLengthNoHTML implements Rule
{
    protected $request;
    protected $min;
    protected $max;
    protected $len;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request, $min, $max)
    {
        $this->request = $request;
        $this->min = $min;
        $this->max = $max;
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
        $clean = html_entity_decode (strip_tags($value));
        $this->len = strlen($clean);

        return ($this->len >= $this->min) && ($this->len <= $this->max);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be longer than ' . $this->min . ' characters and shorter than ' . $this->max . ' characters.';
    }
}
