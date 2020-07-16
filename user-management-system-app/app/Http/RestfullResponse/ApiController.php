<?php
namespace App\Http\RestfullResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;
use Response;

class ApiController extends Controller
{
    public function badRequest($message="bad request", $status_code=IlluminateResponse::HTTP_BAD_REQUEST)
    {
        $response = ['message' => $message, 'status_code' => $status_code];
        return Response::json($response);
    }

    public function requestSuccesfull($data=null, $message="request succesfull", $status_code=IlluminateResponse::HTTP_OK)
    {
       // $response = isset($data) ? ['data'=> $data, 'message' => $message, 'status_code' => IlluminateResponse::HTTP_OK] : ['message' => $message, 'status_code' => IlluminateResponse::HTTP_OK];
        $response = ['message' => $message, 'status_code' => $status_code];
        $data ? $response['data'] = $data : "";
        return Response::json($response);
    }

    function getErrorMessages(\Illuminate\Contracts\Validation\Validator $validator){
        $messages =  $validator->errors()->getMessages();
        $replaced = str_replace(['[',']', '"', '.','id'], '', json_encode(array_values($messages)));
        return explode(',',$replaced);
    }


}