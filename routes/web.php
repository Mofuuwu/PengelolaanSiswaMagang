<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\PlacementLocationController;
use App\Http\Controllers\SchoolAdvisorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityAdvisorController;
use App\Http\Controllers\WorkUnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$_SESSION['logged_in'] = false;
$_SESSION['role'] = '';

Route::get('/', function () {
    if($_SESSION['logged_in'] === false) {
        return redirect()->route('login');   
    } 
    if (isset($_POST['loginRequest'])) {
        
    }

    if ($_SESSION['logged_in'] === true) {
        $_SESSION['role'] = $_POST['login']['role'];

        if ($_SESSION['role'] === 'user') {
            return redirect()->route('user');
        } else if ($_SESSION['role'] === 'admin') {
            return redirect()->route('login');
        }
    }
});

Route::resource('/universityAdvisors', UniversityAdvisorController::class);
Route::resource('/workUnits', WorkUnitController::class);
Route::resource('/placementLocations', PlacementLocationController::class);
Route::resource('/schools', SchoolController::class);
Route::resource('/majors', MajorController::class);
Route::resource('/schoolAdvisors', SchoolAdvisorController::class);
Route::resource('/students', StudentController::class);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
