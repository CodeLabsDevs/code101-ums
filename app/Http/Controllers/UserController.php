<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Http\RestfullResponse\ApiController;
use Illuminate\Http\Response as IlluminateResponse;
use App\Rules\CreateUserValidation;
use App\Rules\UpdateUserValidation;

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


    /**
     * @OA\Get(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="List users",
     *     @OA\Response(
     *          response=200,
     *          description="List of users",
     *          @OA\Schema(ref="#/definitions/User")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *          @OA\Schema(ref="#/definitions/Error")
     *   )
     * ),
     */
    public function index()
    {

        $user = User::all();
        return $this->apiController->requestSuccesfull($user);
    }
     /**
     * @OA\Post(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="Create user",
     *     description="This can only be done by the logged in user.",
     *     operationId="createUser",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
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

     
    /**
     * @OA\Get(
     *     path="/api/user/{id}",
     *     tags={"User"},
     *     summary="Fetch user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     * 		),
     *     @OA\Response(
     *          response=200,
     *          description="A user",
     *          @OA\Schema(ref="#/definitions/User")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *          @OA\Schema(ref="#/definitions/Error")
     *   )
     * ),
 */
    public function show(User $user)
    {
        return $this->apiController->requestSuccesfull($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
   
    public function update(UpdateUserValidation $request, User $user)
    {
        $user->update($request->all());
        return $this->apiController->requestSuccesfull($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Delete(
     *     path="api/user/{id}",
     *     tags={"User"},
     *     summary="Delete user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     * 		),
     *     @OA\Response(
     *          response=204,
     *          description="Delete a user",
     *          @OA\Schema(ref="#/definitions/User")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *          @OA\Schema(ref="#/definitions/Error")
     *   )
     * ),
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->apiController->requestSuccesfull();
    }
}
