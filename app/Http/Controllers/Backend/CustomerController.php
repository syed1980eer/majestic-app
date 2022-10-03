<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        if($request->has('search')){
            $customers = Customer::where('customer_name', 'like', "%{$request->search}%")->orWhere('contact_person_name', 'like', "%{$request->search}%")->get();
        }

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('customers.create', compact('customers'));
    }

    public function store(CustomerStoreRequest $request)
    {
        Customer::create($request->validated());
        // $customers = Customer::all();
        return redirect()->route('customers.index')->with('message', 'Customer Created Successfull');
    }

    public function edit(Customer $customer)
    {
        $customers = Customer::all();
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerStoreRequest $request, Customer $customer)
    {
        $customer->update($validatedData = $request->validated());
        return redirect()->route('customers.index')->with('message', 'Customer Updated successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('message', 'Customer Deleted successfully');
    }
}
