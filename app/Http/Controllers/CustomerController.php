<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display all customers
    public function index()
    {
        $customers = Customer::all();

        return view('customers', [
            'customers' => $customers
        ]);
    }

    // Show the create customer form
    public function create()
    {
        return view('customers.create');
    }

    // Store a new customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Customer::create($validated);

        return redirect('/customers')
            ->with('success', 'Customer created successfully!');
    }

    // Display a specific customer
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    // Show the edit customer form
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    // Update an existing customer
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $customer->update($validated);

        return redirect('/customers')
            ->with('success', 'Customer updated successfully!');
    }

    // Delete a customer
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers')
            ->with('success', 'Customer deleted successfully!');
    }
}
