<?php

namespace App\Http\Controllers;

use App\Models\contactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactformController extends Controller
{
    public function ContactMessage(){
        $con_message = DB::table('contact_forms')->get();
         return view('admin.message.index',compact('con_message'));
     }
    public function ContactForm(Request $request){
        contactForm::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Admin Contact Message Inserted Successfully',
            'alert-type' => 'success'
            );     

      return Redirect()->route('pages.contact')->with($notification);
    }
public function DeleteMessage($id){
    $message = ContactForm::find($id)->delete();
    $notification = array(
        'message' => 'Admin Contact Message Deleted Successfully',
        'alert-type' => 'warning'
        );   
    return Redirect()->route('user.message')->with($notification);
}
   
}
