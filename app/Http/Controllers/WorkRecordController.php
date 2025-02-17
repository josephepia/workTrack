<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkRecordRequest;
use App\Http\Requests\UpdateWorkRecordRequest;
use App\Models\Employee;
use App\Models\Lot;
use App\Models\WorkRecord;
use App\Models\WorkType;

class WorkRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workRecords = WorkRecord::with('employee', 'workType')->paginate(10);
        return view('work_records.index', compact('workRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $workTypes = WorkType::all();
        $lots = Lot::all();
        return view('work_records.create', compact('employees', 'workTypes', 'lots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkRecordRequest $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'work_type_id' => 'required|exists:work_types,id',
            'tariff' => 'required|numeric',
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        WorkRecord::create($request->all());

        return redirect()->route('work_records.index')->with('success', 'Registro de trabajo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkRecord $workRecord)
    {
        return view('work_records.show', compact('workRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkRecord $workRecord)
    {
        $employees = Employee::all();
        $workTypes = WorkType::all();
        $lots = Lot::all();
        return view('work_records.edit', compact('workRecord', 'employees', 'workTypes', 'lots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkRecordRequest $request, WorkRecord $workRecord)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'work_type_id' => 'required|exists:work_types,id',
            'tariff' => 'required|numeric|min:0|max:2147483647',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0|max:2147483647',
        ]);

        $workRecord->update($request->all());

        return redirect()->route('work_records.index')->with('success', 'Registro de trabajo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkRecord $workRecord)
    {
        $workRecord->delete();
        return redirect()->route('work_records.index')->with('success', 'Registro de trabajo eliminado correctamente.');
    }
}
