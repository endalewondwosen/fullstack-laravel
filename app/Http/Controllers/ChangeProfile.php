<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeProfile extends Controller
{
    public function PUpdate(){
if(Auth::user()){
$user = User::find(Auth::user()->id);
if($user){
    return view('admin.body.update_profile',compact('user'));
}
}
    
}
public function ProfileUpdate(Request $request){
    $user = User::find(Auth::user()->id);
    if($user){
        $user->name = $request['user_name'];
        $user->email = $request['user_email'];
        $user->save();
        return Redirect()->back()->with('success','User Profile is Updated Successfully');
    }else{
        return Redirect()->back();
    }
    }
}
