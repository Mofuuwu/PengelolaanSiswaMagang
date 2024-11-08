<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|digits:8',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'responsiblePerson' => 'required|max:255',
        ]);

        $School = new School();

        $School->create($validatedData);
        return redirect()->route('schools.index')->with('success', 'School created successfully.');
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
        $school = School::findOrFail($id);
        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|digits:8',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'responsiblePerson' => 'required|max:255',
        ]);

        $School = School::findOrFail($id);
        $School->update($validatedData);

        return redirect()->route('schools.index')->with('success', 'School update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $School = School::findOrFail($id);
        $School->delete();

        return redirect()->route('schools.index')->with('success', 'School delete successfully');
    }
}