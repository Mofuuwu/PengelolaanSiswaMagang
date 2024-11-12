<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        // dd(Auth::user());
        if(Auth::user()->role === '1') {
            return redirect('/admin');
        }
        return view('users.index');
    }
}
