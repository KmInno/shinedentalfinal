<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\Procedure;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $employees = Employee::all();
        $procedures = Procedure::all();

        return view('appointments.create', compact('patients', 'employees', 'procedures'));
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
            'patient_id' => 'required|exists:patients,id',
            'description' => 'nullable|string',
            'time' => 'required|date',
            'status' => 'required|in:pending,completed,rejected by doctor,cancelled by patient',
            'employee_id' => 'required|exists:employees,id',
            'procedure_id' => 'required|exists:procedures,id',
        ]);

        // Create a new appointment
        Appointment::create($validatedData);

        // Redirect to the appointments index page with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $employees = Employee::all();
        $procedures = Procedure::all();
    
        return view('appointments.edit', compact('appointment', 'patients', 'employees', 'procedures'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'nullable|string',
            'time' => 'required|date',
            'status' => 'required|in:pending,completed,rejected by doctor,cancelled by patient',
            'employee_id' => 'required|exists:employees,id',
            'procedure_id' => 'required|exists:procedures,id',
        ]);

        // Update the appointment
        $appointment->update($validatedData);

        // Redirect back to the appointment's show page with a success message
        return redirect()->route('appointments.show', $appointment)->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();

        // Redirect back to the appointments index page with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
