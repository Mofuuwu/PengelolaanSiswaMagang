<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementLocation;

class PlacementLocationController extends Controller
{
    public function index()
    {
        $placementLocations = PlacementLocation::all();
        return view('placementLocations.index', compact('placementLocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('placementLocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required',
        'address' => 'required',
    ]);

    do {
        $randomId = random_int(100000, 999999);
    } while (PlacementLocation::where('id', $randomId)->exists()); // Pastikan ID unik

    $PlacementLocation = new PlacementLocation();
    $PlacementLocation->id = $randomId;
    $PlacementLocation->fill($validatedData);
    $PlacementLocation->save();

    return redirect()->route('placementLocations.index')->with('success', 'Lokasi penempatan created successfully.');
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
        $placementLocation = PlacementLocation::findOrFail($id);
        return view('placementLocations.edit', compact('placementLocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $placementLocation = PlacementLocation::findOrFail($id);
        $placementLocation->update($validatedData);

        return redirect()->route('placementLocations.index')->with('success', 'Jurusan update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $PlacementLocation = PlacementLocation::findOrFail($id);
        $PlacementLocation->delete();
        return redirect()->route('placementLocations.index')->with('success', 'Jurusan Delete successfully.');
    }
}
