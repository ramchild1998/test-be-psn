<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Address;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('addresses')
            ->orderBy('name')
            ->get();

        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::with('addresses')->find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'phone_number' => 'required|string|max:255',
            'image' => 'required|url',
            'email' => 'required|email|unique:customers,email'
        ]);

        $customer = Customer::create($validated);

        return response()->json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'name' => 'string|max:255',
            'gender' => 'string|max:1',
            'phone_number' => 'string|max:255',
            'image' => 'url',
            'email' => 'email|unique:customers,email,' . $id
        ]);

        $customer->update($validated);

        return response()->json($customer);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
