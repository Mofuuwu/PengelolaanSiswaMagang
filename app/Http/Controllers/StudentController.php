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
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $majors = Major::all();
        $schools = School::all();
        $schoolAdvisors = SchoolAdvisor::all();
        return view('admin.students.create', compact('schools', 'schoolAdvisors', 'majors'));
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
            'profilePhoto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'fatherName' => 'required|string',
            'motherName' => 'required|string',
            'motherJob' => 'required|string',
            'schoolAdvisor_id' => 'required|max:255'
        ]);


        
        $Student = new Student();
        $file = $request->file('profilePhoto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/img/students', $filename);

        if($request->anotherFatherJob !== null) {
            $Student->fatherJob = $request->anotherFatherJob;
        } else if ($request->anotherFatherJob === null) {
            $Student->fatherJob = $request->fatherJob;
        }

        if($request->anotherMotherJob !== null) {
            $Student->motherJob = $request->anotherMotherJob;
        } else if ($request->anotherMotherJob === null) {
            $Student->motherJob = $request->motherJob;
        }

        $Student->profilePhoto = basename($path);
        $Student->fill($validatedData);
        $Student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function show(string $id)
    {
        $student = Student::with('major', 'school', 'schoolAdvisor')->findOrFail($id);
        return view('admin.students.detail', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        $schools = School::all();
        $schoolAdvisors = SchoolAdvisor::all();
        return view('admin.students.edit', compact('student','schools', 'schoolAdvisors', 'majors'));
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
