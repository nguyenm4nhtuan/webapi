<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Customer::all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json($customer);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json('Customer not exists', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest $updateCustomerRequest
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCustomerRequest $updateCustomerRequest, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->fill($updateCustomerRequest->only(['name', 'address', 'age', 'tel']));
            if ($customer->save()) {
                return response()->json([
                    'message' => 'Update customer success',
                    'data' => $customer
                ]);
            }
            return response()->json([
                'message' => 'Can not update customer this time, please try again',
                'data' => ''
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json([
                'message' => 'Customer not exists',
                'data' => ''
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
