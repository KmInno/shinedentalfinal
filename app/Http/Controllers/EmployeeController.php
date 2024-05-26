<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'speciality' => 'required|string',
            'working_days' => 'required|string',
            'working_hours' => 'required|string',
        ]);

        // Create a new employee
        Employee::create($validatedData);

        // Redirect to the employees index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'speciality' => 'required|string',
            'working_days' => 'required|string',
            'working_hours' => 'required|string',
        ]);

        // Update the employee
        $employee->update($validatedData);

        // Redirect back to the employee's show page with a success message
        return redirect()->route('employees.show', $employee)->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // Delete the employee
        $employee->delete();

        // Redirect back to the employees index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
