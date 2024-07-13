<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function index()
    {
        return CustomerResource::collection(Customer::all());
    }


    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return new CustomerResource($customer);
    }


    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }


    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return new CustomerResource($customer);
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->noContent();
    }
}
