<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\School;
use App\Models\SchoolAdvisor;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('school', 'major', 'schoolAdvisor')->get();
        // dd($students);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $majors = Major::all();
        $schools = School::all();
        $schoolAdvisors = SchoolAdvisor::all();
        return view('students.create', compact('schools', 'schoolAdvisors', 'majors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|digits:6',
            'name' => 'required|max:255',
            'class' => 'required',
            'major_id' => 'required|string|max:255',
            'school_id' => 'required|max:255',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'address' => 'required|max:255',
            'schoolAdvisor_id' => 'required|max:255'
        ]);

        $Student = new Student();
        $Student->create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        $schools = School::all();
        $schoolAdvisors = SchoolAdvisor::all();
        return view('students.edit', compact('student','schools', 'schoolAdvisors', 'majors'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id' => 'required|digits:6',
            'name' => 'required|max:255',
            'class' => 'required',
            'major_id' => 'required|string|max:255',
            'school_id' => 'required|max:255',
            'phoneNumber' => 'required|regex:/^0[0-9]+$/|digits_between:11,13',
            'address' => 'required|max:255',
            'schoolAdvisor_id' => 'required|max:255'
        ]);

        $Student = Student::findOrFail($id);
        $Student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        $students = Student::findOrFail($id);
        $students->delete(); 

        return redirect()->route('students.index')->with('success', 'Data Student berhasil dihapus');
    }
}
