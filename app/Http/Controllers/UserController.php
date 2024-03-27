<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function UserLogin(){
    return view('auth.login');
  }
   public function LogoutUser(){
    Auth::logout();
    return Redirect()->route('login')->with('success','User logout Successfully');
  }
   public function Register(){
     return view('auth.register');
   }

    public function RegisterUser(Request $request){
      $validated = $request->validate([
                  'name' => 'required|unique:users|max:255',
                  'email' => 'required',
                  'password' => 'required',
              ]);
              User::insert([
               'name' => $request->name,
               'email' => $request->email,
               'password' => $request->name,
               'created_at' =>Carbon::now(),
           ]);
           return Redirect()->route('login')->with('success','User registered  Successfully');
         }
         
    }
  