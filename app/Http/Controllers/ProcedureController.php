<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures = Procedure::all();
        return view('procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procedures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        Procedure::create($request->all());

        return redirect()->route('procedures.index')->with('success', 'Procedure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        return view('procedures.show', compact('procedure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        return view('procedures.edit', compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedure $procedure)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $procedure->update($request->all());

        return redirect()->route('procedures.index')->with('success', 'Procedure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()->route('procedures.index')->with('success', 'Procedure deleted successfully.');
    }

    // use App\Models\Procedure;

    public function getProcedurePrice(Procedure $procedure)
    {
        return response()->json(['price' => $procedure->amount]);
    }

}
