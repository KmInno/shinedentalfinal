<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Patient;
use App\Models\Procedure;
use App\Models\User;
use App\Models\Employee;

class ReceiptController extends Controller
{
    public function create()
    {
        $patients = Patient::all();
        $procedures = Procedure::all();
        $users = User::all();
        $employees = Employee::all(); // Fetching all employees

        return view('receipts.create', compact('patients', 'procedures', 'users', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patients' => 'required|array',
            'patients.*.name' => 'required|string|exists:patients,name',
            'patients.*.balance' => 'required|numeric|min:0',
            'procedures' => 'required|array',
            'procedures.*.name' => 'required|string|exists:procedures,name',
            'procedures.*.cost' => 'required|numeric|min:0',
            'issued_by' => 'required|exists:users,id',
            'employee_id' => 'required|exists:employees,id', // Changed to employee_id
            'prescription' => 'nullable|string',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $receipt = new Receipt();
        $receipt->issued_by = $request->input('issued_by');
        $receipt->employee_id = $request->input('employee_id'); // Changed to employee_id
        $receipt->prescription = $request->input('prescription');
        $receipt->discount = $request->input('discount', 0);

        $patientsData = [];
        foreach ($request->input('patients') as $patient) {
            $patientsData[] = [
                'name' => $patient['name'],
                'balance' => $patient['balance'],
            ];
        }

        $proceduresData = [];
        foreach ($request->input('procedures') as $procedure) {
            $proceduresData[] = [
                'name' => $procedure['name'],
                'cost' => $procedure['cost'],
            ];
        }

        // Calculate the total cost of procedures
        $totalCost = array_reduce($proceduresData, function ($carry, $item) {
            return $carry + $item['cost'];
        }, 0);

        // Apply discount if present
        if ($receipt->discount > 0) {
            $totalCost -= $receipt->discount;
        }

        // Save the total cost to the receipt
        $receipt->total_cost = $totalCost;

        // Save the receipt
        $receipt->save();

        // Attach patients and procedures to the receipt
        foreach ($patientsData as $patientData) {
            $patient = Patient::where('name', $patientData['name'])->first();
            $receipt->patients()->attach($patient->id, ['balance' => $patientData['balance']]);
        }

        foreach ($proceduresData as $procedureData) {
            $procedure = Procedure::where('name', $procedureData['name'])->first();
            $receipt->procedures()->attach($procedure->id, ['cost' => $procedureData['cost']]);
        }

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }
}
