<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Middleware;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
  public function AdminContact(){
   $contacts = Contact::all();
   return view('admin.contact.index',compact('contacts'));
  }
public function AddAdminContact(){
   return view('admin.contact.create');
}
public function StoreAdminContact(Request $request)
{
   $validated = $request->validate(
      [
      'email'=>'required|unique:contacts',
      'phone'=>'required|min:13',
      'address'=>'required'
      ],
   [
      'email'=>'please fill email',
      'phone'=>'phone number should not be less than 13',
      'address'=>'Address should be filled'
   ]);

    Contact::insert([
      'email'=>$request->email,
      'phone'=>$request->phone,
      'address'=>$request->address,
      'created_at'=>Carbon::now(),
   ]);
   $notification = array(
      'message' => 'Admin Contact Inserted Successfully',
      'alert-type' => 'info'
      );     
return redirect()->back()->with($notification);
}  
public function EditAdminContact($id){
   $contact = Contact::find($id);
return view('admin.contact.edit',compact('contact'));

}
public function UpdateAdminContact(Request $request,$id){
   $validated = $request->validate(
      [
      'email'=>'required|unique:contacts',
      'phone'=>'required|min:13',
      'address'=>'required'
      ],
   [
      'email'=>'please fill email',
      'phone'=>'phone number should not be less than 13',
      'address'=>'Address should be filled'
   ]);

    Contact::find($id)->update([
      'email'=>$request->email,
      'phone'=>$request->phone,
      'address'=>$request->address,
      'created_at'=>Carbon::now(),
   ]);
   $notification = array(
      'message' => 'Admin Contact Updated Successfully',
      'alert-type' => 'info'
      );     
return redirect()->back()->with($notification);

}
 public function DeleteAdminContact($id){
   $contact = Contact::find($id)->update();
   $notification = array(
      'message' => 'Admin Contact Deleted Successfully',
      'alert-type' => 'warning'
      );     
return redirect()->route('admin.contact')->with($notification);

 }
public function HomeContact(){
    
        return view('pages.contact');
   } 

}
