<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource or editing an existing one if it exists.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
            'description' => 'nullable|string',
        ]);

        // Create a new department
        Department::create($validatedData);

        // Redirect to the departments index page with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // If department does not exist, redirect to create page
        if (!$department->exists) {
            return redirect()->route('departments.create');
        }

        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // Update the department
        $department->update($validatedData);

        // Redirect back to the department's show page with a success message
        return redirect()->route('departments.show', $department)->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        // Delete the department
        $department->delete();

        // Redirect back to the departments index page with a success message
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}

