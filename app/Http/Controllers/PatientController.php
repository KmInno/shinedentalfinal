<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Procedure;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $procedures = Procedure::all();
        return view('patients.create', compact('procedures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date' => 'required|date',
            'contact' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'age' => 'required|integer',
            'address' => 'required|string',
            'procedure_id' => 'required|exists:procedures,id',
            'description' => 'nullable|string',
            'balance' => 'required|numeric',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $procedures = Procedure::all();
        return view('patients.edit', compact('patient', 'procedures'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date' => 'required|date',
            'contact' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'age' => 'required|integer',
            'address' => 'required|string',
            'procedure_id' => 'required|exists:procedures,id',
            'description' => 'nullable|string',
            'balance' => 'required|numeric',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}


