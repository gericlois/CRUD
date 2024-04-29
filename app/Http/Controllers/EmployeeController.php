<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Employee; // Assuming your Employee model is in the 'App\Models' namespace
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming you want to fetch all employees and pass them to a view
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255', 
            'password' => 'required|max:255',
        ]);

        Employee::create($request->all());
        session()->flash('message', 'Employee account added successfully.');
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.index', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255', 
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        session()->flash('message', 'Employee account updated successfully.');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        session()->flash('message', 'Employee account deleted successfully.');
        return redirect()->route('employees.index');
    }
    public function create()
    {
      return view('employees.create');
    }

    /**
     * Edit the specified resource from storage.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }
}
