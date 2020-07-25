<?php
namespace App\Http\Validators;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\RestfullResponse\ApiController;

trait ValidatorTrait
{
    public function failedValidation(Validator $validator)
    {
        $response = [
            'message' => (new ApiController())->getErrorMessages($validator),
            'status_code' => IlluminateResponse::HTTP_BAD_REQUEST,
            'status' => false
        ];

        throw new HttpResponseException(response($response, IlluminateResponse::HTTP_BAD_REQUEST));
        
    }


}