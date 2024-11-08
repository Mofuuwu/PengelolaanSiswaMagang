<?php

namespace App\Http\Controllers;

use App\Models\PlacementLocation;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index()
    {
        $workUnits = WorkUnit::with('placementLocation')->get();
        // dd($workUnits);
        return view('workUnits.index', compact('workUnits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $placementLocations = PlacementLocation::all();
        return view('workUnits.create', compact('placementLocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'leader' => 'required',
            'placementLocation_id' => 'required',
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (WorkUnit::where('id', $randomId)->exists());

        $WorkUnit = new WorkUnit();

        $WorkUnit->id = $randomId;
        $WorkUnit->fill($validatedData);
        $WorkUnit->save();

        return redirect()->route('workUnits.index')->with('success', 'Unit Kerja created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $placementLocations = PlacementLocation::all();
        $workUnit = WorkUnit::findOrFail($id);
        return view('workUnits.edit', compact('workUnit', 'placementLocations'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'leader' => 'required',
            'placementLocation_id' => 'required|exists:placement_locations,id',
        ]);

        $workUnit = WorkUnit::findOrFail($id);
        $workUnit->update($validatedData);

        return redirect()->route('workUnits.index')->with('success', 'Unit Kerja updated successfully.');
    }

    public function destroy($id)
    {
        $workUnit = WorkUnit::findOrFail($id);
        $workUnit->delete();

        return redirect()->route('workUnits.index')->with('success', 'Unit Kerja deleted successfully.');
    }

}
