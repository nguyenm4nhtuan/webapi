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

    Route::get('customers', 'Api\CustomerController@index');

    Route::get('customers/{id}', 'Api\CustomerController@show');

    Route::match(['PUT', 'PATCH'],'customers/{id}', 'Api\CustomerController@update');
});