<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PlacementLocationController;
use App\Http\Controllers\SchoolAdvisorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityAdvisorController;
use App\Http\Controllers\WorkUnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


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

// $_SESSION['logged_in'] = false;
// $_SESSION['role'] = '';

// Route::get('/', function () {
//     if($_SESSION['logged_in'] === false) {
//         return redirect()->route('login');   
//     } 
//     if (isset($_POST['loginRequest'])) {
        
//     }

//     if ($_SESSION['logged_in'] === true) {
//         $_SESSION['role'] = $_POST['login']['role'];

//         if ($_SESSION['role'] === 'user') {
//             return redirect()->route('user');
//         } else if ($_SESSION['role'] === 'admin') {
//             return redirect()->route('login');
//         }
//     }
// });

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
//tambahin moddleware auth


Route::resource('/admin/universityAdvisors', UniversityAdvisorController::class)->middleware('auth');
Route::resource('/admin/workUnits', WorkUnitController::class)->middleware('auth');
Route::resource('/admin/placementLocations', PlacementLocationController::class)->middleware('auth');
Route::resource('/admin/schools', SchoolController::class)->middleware('auth');
Route::resource('/admin/majors', MajorController::class)->middleware('auth');
Route::resource('/admin/schoolAdvisors', SchoolAdvisorController::class)->middleware('auth');
Route::resource('/admin/students', StudentController::class)->middleware('auth');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/', fn () =>  redirect('/login'));