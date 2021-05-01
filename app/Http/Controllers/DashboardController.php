<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        

        if (Auth::check()) {
            // The user is logged in...
            return  "loged in";
        }
        else{
            return redirect(route('login'));
        }
       return Auth::user();
        return view('dashboard');
    }
}
