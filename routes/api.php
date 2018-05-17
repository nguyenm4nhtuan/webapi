<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => ['jwt.auth']], function () {

    /**
     * @SWG\Info(title="Web Api version ", version="v1")
     */

    /**
     * @SWG\Definition(
     *   definition="customer",
     *   @SWG\Property(property="email", type="string"),
     *   @SWG\Property(property="name", type="string"),
     *   @SWG\Property(property="address", type="string"),
     *   @SWG\Property(property="tel", type="string"),
     *   @SWG\Property(property="age", type="number"),
     * )
     */

    /**
     * @SWG\Get(
     *      path="/api/v1/customers",
     *      @SWG\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         type="string",
     *         description="Bearer xxx  with xxx = true for logged in",
     *     ),
     *     @SWG\Response(
     *          response="200",
     *          description="A list resources customers",
     *          @SWG\Schema(
     *              type="array",
     *              @SWG\Items(ref="#/definitions/customer")
     *          )
     *     ),
     *     @SWG\Response(response="401", description="Unauthorized")
     * )
     */
    Route::get('customers', 'Api\CustomerController@index');

    /**
     * @SWG\Get(
     *      path="/api/v1/customers/{id}",
     *      @SWG\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         type="string",
     *         description="Bearer xxx  with xxx = true for logged in",
     *     ),
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         description="ID of customer to return",
     *     ),
     *     @SWG\Response(
     *          response="200",
     *          description="A resource customer",
     *          @SWG\Schema(
     *              type="object",
     *              ref="#/definitions/customer"
     *          )
     *     ),
     *     @SWG\Response(response="401", description="Unauthorized")
     * )
     */
    Route::get('customers/{id}', 'Api\CustomerController@show');

    /**
     * @SWG\Put(
     *      path="/api/v1/customers/{id}",
     *      @SWG\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         type="string",
     *         description="Bearer xxx  with xxx = true for logged in",
     *     ),
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         description="ID of customer to return",
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="formData",
     *         description="Name of customer",
     *         required=false,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="address",
     *         in="formData",
     *         description="Address of customer",
     *         required=false,
     *         type="string",
     *     ),
     *     @SWG\Parameter(
     *         name="tel",
     *         in="formData",
     *         description="Phone number of customer",
     *         required=false,
     *         type="string",
     *     ),
     *     @SWG\Parameter(
     *         name="age",
     *         in="formData",
     *         description="Age of customer",
     *         required=false,
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *          response="200",
     *          description="A resource customer",
     *          @SWG\Schema(
     *              type="object",
     *              ref="#/definitions/customer"
     *          )
     *     ),
     *     @SWG\Response(response="401", description="Unauthorized"),
     *     @SWG\Response(response="422", description="Unprocessable Entity"),
     *     @SWG\Response(response="500", description="Internal Server Erro")
     * )
     */
    Route::match(['PUT', 'PATCH'],'customers/{id}', 'Api\CustomerController@update');
});