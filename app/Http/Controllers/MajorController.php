<?php

namespace App\Http\Controllers;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);
        do {
            $randomId = random_int(100000, 999999);
        } while (Major::where('id', $randomId)->exists());


        $Major = new Major();

        $Major->id = $randomId;
        $Major->fill($validatedData);
        $Major->save();

        return redirect()->route('majors.index')->with('success', 'Major created successfully.');
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
        $major = Major::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);

        $Major = Major::findOrFail($id);
        $Major->update($validatedData);

        return redirect()->route('majors.index')->with('success', 'Major update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Major = Major::findOrFail($id);
        $Major->delete();
        return redirect()->route('majors.index')->with('success', 'Major Delete successfully.');
    }
}
