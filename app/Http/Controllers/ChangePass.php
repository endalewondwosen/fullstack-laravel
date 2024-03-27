<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
  public function CPassword(){
return view('admin.body.change_password');
  }
public function UpdatePasword(Request $request){
 $validated = $request->validate([
    'old_password'=>'required',
    'password'=>'required|confirmed',
 ]);
 $hashedPassword = Auth::user()->password; 
 if(Hash::check($request->old_password, $hashedPassword)){
   $user = User::find(Auth::id());
   $user->password = Hash::make($request->password);
   $user->save();
   Auth::logout();
   return Redirect()->route('login')->with('success', 'password is changed successfully');

}else{
return Redirect()->back()->with('Error','Current password is Invalid');
}
}
}