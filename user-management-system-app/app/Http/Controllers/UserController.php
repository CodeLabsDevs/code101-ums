<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Http\RestfullResponse\ApiController;
use Illuminate\Http\Response as IlluminateResponse;
use App\Rules\CreateUserValidation;

class UserController extends Controller
{
    private $apiController;

    public function __construct(ApiController $apiController)
    {
        $this->apiController = $apiController;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::all();
        return $this->apiController->requestSuccesfull($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserValidation $request)
    {
        $user = User::create($request->toArray());
        return $this->apiController->requestSuccesfull();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user) return $this->apiController->requestSuccesfull($user);
        return $this->apiController->badRequest();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user) return $this->apiController->badRequest();
        $user->update($request->all());
        return $this->apiController->requestSuccesfull($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) return $this->apiController->badRequest();
        $user->delete();
        return $this->apiController->requestSuccesfull();
    }
}
