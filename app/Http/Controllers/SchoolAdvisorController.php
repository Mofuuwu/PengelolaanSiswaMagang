<?php

namespace App\Http\Controllers;
use App\Models\SchoolAdvisor;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolAdvisorController extends Controller
{
    public function index()
    {
        $schoolAdvisors = SchoolAdvisor::with('school')->get();
        return view('schoolAdvisors.index', compact('schoolAdvisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        return view('schoolAdvisors.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'school_id' => 'required'
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (SchoolAdvisor::where('id', $randomId)->exists());


        $SchoolAdvisor = new SchoolAdvisor();

        $SchoolAdvisor->id = $randomId;
        $SchoolAdvisor->fill($validatedData);
        $SchoolAdvisor->save();

        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah created successfully.');
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
        $schoolAdvisor = SchoolAdvisor::findOrFail($id);
        $schools = School::all();
        return view('schoolAdvisors.edit', compact('schoolAdvisor', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'school_id' => 'required'
        ]);

        $SchoolAdvisor = SchoolAdvisor::findOrFail($id);
        $SchoolAdvisor->update($validatedData);

        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $SchoolAdvisor = SchoolAdvisor::findOrFail($id);
        $SchoolAdvisor->delete();
        return redirect()->route('schoolAdvisors.index')->with('success', 'Pembimbing Sekolah Delete successfully.');
    }
}
