<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolAdvisor;
use App\Models\Student;
use App\Models\UniversityAdvisor;
use App\Models\User;
use App\Models\WorkUnit;
use App\Models\Major;
use App\Models\PlacementLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        
        if(Auth::user()->role === '3') {
            return redirect('/user');
        }

        $userTotal = User::count();
        $studentTotal = Student::count();
        $schoolAdvisorTotal = SchoolAdvisor::count();
        $schoolTotal = School::count();
        $workUnitTotal = WorkUnit::count();
        $universityAdvisorTotal = UniversityAdvisor::count();
        $majorTotal = Major::count();
        $placementLocationTotal = PlacementLocation::count();

        return view('admin', compact('userTotal', 'studentTotal', 'schoolAdvisorTotal', 'schoolTotal', 'workUnitTotal', 'universityAdvisorTotal', 'majorTotal', 'placementLocationTotal'));
    }
}
