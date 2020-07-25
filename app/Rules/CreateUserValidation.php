<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Validators\ValidatorTrait;

class CreateUserValidation extends FormRequest 
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ];
    }

    // /**
    //  * Get the validation error message.
    //  *
    //  * @return string
    //  */
    // public function message()
    // {
    //     return [
    //         //'name.required' => 'Name is required',
    //         'email.required' => 'Email is required',
    //         'password.required' => 'Password is required'
    //     ];
    // }

    public function authorize(){
        return true;
    }
}
