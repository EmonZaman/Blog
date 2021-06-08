<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth as Aut;


class RegisterController extends Controller
{
    public function index()
     {
        return view('register');
     }
     public function store(Request $request)
     {
           dd ($request->only('email','password'));

         
         User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           //'check'=>$request->check,
           'password'=>Hash::make($request->password),

         ]);

        
         Aut::attempt($request->only('email','password'));

           
         return Aut::user();
         

         return redirect()->route('dashboard');
        
     }
}
