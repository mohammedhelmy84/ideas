<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
       $validated = request()->validate([
         'name'=>'required|min:3|max:50',
         'email'=>'required|email|unique:users,email',
         'password'=>'required|confirmed|min:8'
       ]);

       User::create([
          'name'=>$validated['name'],
          'email'=>$validated['email'],
          'password'=>Hash::make($validated['password'])
       ]);

       return redirect()->route('dashboard')->with('success','Account created successfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
          ]);


            $user_email=User::where('email',$validated['email'])->first();
            $user_password=User::where('password',Hash::make($validated['password']))->first();

            if(auth()->attempt($validated)){
                return redirect()->route('dashboard')->with('success','Logged in successfully');
              }

            elseif($user_email?->email==null){
                return redirect()->route('login')->withErrors([
                    'email'=>"Check email"
                  ]);
            }

            elseif($user_password?->password==null){
                return redirect()->route('login')->withErrors([
                    'password'=>"Check password"
                  ]);
            }

    }

    public function logout(){
      auth()->logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect()->route('dashboard')->with('success','Logout successfully');
    }
}
