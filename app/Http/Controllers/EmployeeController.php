<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Método para mostrar todos los empleados
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Método para mostrar el formulario de creación de empleado
    public function create()
    {
        return view('employees.create');
    }

    // Método para almacenar un nuevo empleado
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string',
            'position' => 'required|string',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index');
    }

    // Método para mostrar un empleado específico
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    // Método para mostrar el formulario de edición de empleado
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Método para actualizar un empleado
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string',
            'position' => 'required|string',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index');
    }

    // Método para eliminar un empleado
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}