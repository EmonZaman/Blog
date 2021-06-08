<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Aut;

class DashboardController extends Controller
{




    public function index()
    {
        return Aut::user();
            
        return view('dashboard');
    }
}
