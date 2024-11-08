<?php

namespace App\Http\Controllers;

use App\Models\PlacementLocation;
use App\Models\UniversityAdvisor;
use App\Models\WorkUnit;
use Illuminate\Http\Request;

class UniversityAdvisorController extends Controller
{
    public function index()
    {
        $universityAdvisors = UniversityAdvisor::with('placementLocation', 'workUnit')->get();
        return view('universityAdvisors.index', compact('universityAdvisors'));
    }
    public function create()
    {
        $workUnits = WorkUnit::all();
        $placementLocations = PlacementLocation::all();
        return view('universityAdvisors.create', compact('workUnits', 'placementLocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'unit_id' => 'required',
            'placementLocation_id' => 'required'
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (UniversityAdvisor::where('id', $randomId)->exists());


        $UniversityAdvisor = new UniversityAdvisor();

        $UniversityAdvisor->id = $randomId;
        $UniversityAdvisor->fill($validatedData);
        $UniversityAdvisor->save();

        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $universityAdvisor = UniversityAdvisor::findOrFail($id);
        $workUnits = WorkUnit::all();
        $placementLocations = PlacementLocation::all();
        return view('universityAdvisors.edit', compact('universityAdvisor','workUnits', 'placementLocations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'unit_id' => 'required',
            'placementLocation_id' => 'required'
        ]);

        $UniversityAdvisor = UniversityAdvisor::findOrFail($id);

        $UniversityAdvisor->update($validatedData);

        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $UniversityAdvisor = UniversityAdvisor::findOrFail($id);
        $UniversityAdvisor->delete();
        return redirect()->route('universityAdvisors.index')->with('success', 'Pembimbing Universitas Delete successfully.');
    }
}
