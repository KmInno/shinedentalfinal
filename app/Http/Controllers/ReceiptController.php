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
    public function index()
    {
        $receipts = Receipt::all();
        return view('receipts.index', compact('receipts'));
    }

    public function create()
    {
        $patients = Patient::all();
        $procedures = Procedure::all();
        $users = User::all();
        $employees = Employee::all();

        return view('receipts.create', compact('patients', 'procedures', 'users', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'issued_by' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:employees,id',
            'prescription' => 'nullable|string',
            'procedure_id' => 'required|exists:procedures,id',
            'balance' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $receipt = new Receipt();
        $receipt->patient_id = $request->input('patient_id');
        $receipt->issued_by = $request->input('issued_by');
        $receipt->doctor_id = $request->input('doctor_id');
        $receipt->prescription = $request->input('prescription');
        $receipt->procedure_id = $request->input('procedure_id');
        $receipt->balance = $request->input('balance', 0);
        $receipt->discount = $request->input('discount', 0);

        // Calculate the total cost of the procedure
        $procedure = Procedure::findOrFail($request->input('procedure_id'));
        $totalCost = $procedure->amount;

        // Apply discount if present
        if ($receipt->balance > 0) {
            $totalCost += $receipt->balance;
        }

        // Save the total cost to the receipt
        $receipt->total_cost = $totalCost;

        // Save the receipt
        $receipt->save();

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }

    public function show($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('receipts.show', compact('receipt'));
    }

    public function destroy($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
    }
    
}
