<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function AllAbout(){
        $abouts = About::latest()->get();
        return view('admin.about.index',compact('abouts'));
    }
    public function AddAbout(){
        return view('admin.about.create');
    }
    public function StoreAbout(Request $request){
        $validated = $request->validate([
            'title' =>'required|unique:abouts|min:4',
            'short_desc'=>'required|min:15',
            'long_desc'=>'required|min:15',
        ],
        [
            'title.required'=>'please fill title',
            'short_desc.min'=>'short description should  not be less than 15',
            'long_desc.min'=>'short description should not be less than 15'
        ]);
        About::insert([
         'title' => $request->title,
         'short_desc' =>$request->short_desc,
         'long_desc' => $request->long_desc,
        ]);
        $notification = array(
            'message' => 'About Inserted Successfully !!',
            'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

    } 
 public function EditAbout($id){
    $about = About::find($id);
    return view('admin.about.edit',compact('about'));
 }  
 public function UpdateAbout(Request $request, $id){
    $validated = $request->validate([
        'title' =>'required|unique:abouts|min:4',
        'short_desc'=>'required|min:15',
        'long_desc'=>'required|min:15',
    ],
    [
        'title.required'=>'please fill title',
        'short_desc.min'=>'short description should  not be less than 15',
        'long_desc.min'=>'short description should not be less than 15'
    ]);
    About::find($id)->update([
     'title' => $request->title,
     'short_desc' =>$request->short_desc,
     'long_desc' => $request->long_desc,
    ]);
    $notification = array(
        'message' => 'About updated Successfully !!',
        'alert-type' => 'info'
        );

            return Redirect()->back()->with($notification);
} 

public function DeleteAbout($id){
    $about = About::find($id)->delete();
    $notification = array(
        'message' => 'About Deleted Successfully !!',
        'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);

}
public function HomeAbout(){
    $about = About::latest()->get();
    return view('pages.about',compact('about'));
}
 }
    

