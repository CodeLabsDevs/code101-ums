<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Http\RestfullResponse\ApiController;
use Illuminate\Http\Response as IlluminateResponse;

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
    public function store(Request $request)
    {

        try{
            if(empty($request)){
                return $this->apiController->badRequest();
            }
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
    
            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ]);

            $is_saved = $user->save();
            
            if(!$is_saved){
                return $this->apiController->badRequest();
            }


        }catch(\Exception $e){
            return $this->apiController->badRequest($e->getMessage());
        }

        return $this->apiController->requestSuccesfull();
        //response()->json(['created' => 'true'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user) return $this->apiController->badRequest();
        return $this->apiController->requestSuccesfull($user);
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
        if($user) return $this->apiController->badRequest();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $is_saved = $user->save();
        if(!$is_saved) return $this->apiController->badRequest();
        return $this->apiController->requestSuccessfull($user);
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
