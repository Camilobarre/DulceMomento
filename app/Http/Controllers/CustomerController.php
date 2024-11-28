<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Método para mostrar todos los clientes
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Método para mostrar el formulario de creación de cliente
    public function create()
    {
        return view('customers.create');
    }

    // Método para almacenar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers',
            'phone' => 'nullable|string|max:15',
            'preferences' => 'nullable|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index');
    }

    // Método para mostrar un cliente específico
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Método para mostrar el formulario de edición de cliente
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Método para actualizar un cliente
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:15',
            'preferences' => 'nullable|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index');
    }

    // Método para eliminar un cliente
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}