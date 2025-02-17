<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLotRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Lot;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lots = Lot::paginate(10);
        return view('lots.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lots.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLotRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Lot::create($request->only('name'));

        return redirect()->route('lots.index')->with('success', 'Lote creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lot $lot)
    {
        return view('lots.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lot $lot)
    {
        return view('lots.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $lot->update($request->only('name'));

        return redirect()->route('lots.index')->with('success', 'Lote actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lot $lot)
    {
        $lot->delete();
        return redirect()->route('lots.index')->with('success', 'Lote eliminado correctamente.');
    }
}
