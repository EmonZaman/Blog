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
        return view('auth.register');
     }
     public function store(Request $request)
     {
         // return ($request->only('email','password'));

         $this->validate($request,[
           'name'=>'required|max:250',
           'username'=>'required|max:250',
           

           'email'=>'required|email|max:250',
           //'check'=>'required|max:250',
           'password'=>'required|confirmed',
         ]);
         
         User::create([
           'name'=>$request->name,
           'username'=>$request->username,
           'email'=>$request->email,
           //'check'=>$request->check,
           'password'=>Hash::make($request->username),

         ]);

         $credentials = $request->only('email', 'password');

         if (Aut::attempt($credentials)) {
             $request->session()->regenerate();
 
         return Aut::user()->email;}

         return redirect()->route('dashboard');
        
     }
}
