<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkTypeRequest;
use App\Http\Requests\UpdateWorkTypeRequest;
use App\Models\WorkType;

class WorkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workTypes = WorkType::all();
        return view('work_types.index', compact('workTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkTypeRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WorkType::create($request->all());

        return redirect()->route('work_types.index')->with('success', 'Tipo de trabajo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkType $workType)
    {
        return view('work_types.show', compact('workType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkType $workType)
    {
        return view('work_types.edit', compact('workType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkTypeRequest $request, WorkType $workType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $workType->update($request->all());

        return redirect()->route('work_types.index')->with('success', 'Tipo de trabajo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkType $workType)
    {
        $workType->delete();
        return redirect()->route('work_types.index')->with('success', 'Tipo de trabajo eliminado correctamente.');
    }
}
