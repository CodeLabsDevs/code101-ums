<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Validators\ValidatorTrait;

class UpdateUserValidation extends FormRequest 
{
    use ValidatorTrait;
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
    public function rules()
    {
        return [ 
            'email' => 'unique:users'
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */

    public function authorize(){
        return true;
    }
}
