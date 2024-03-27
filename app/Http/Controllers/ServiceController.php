<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function AllService(){
        $services = Service::latest()->get();
        return view('admin.service.index',compact('services'));
    }
    public function AddService(){
    return view('admin.service.create');
    }
    public function StoreService(Request $request){
        
    $validated = $request->validate([
        'title' =>'required|unique:sliders|min:4',
        'short_desc'=>'required',
        'image'=>'required|mimes:png,jpeg,jpg'
    ],
    [
        'title.required'=>'please fill title',
        'title.unique'=>'title must be unique',
        'title.min'=>'title should be not less four character'
    ]
    );
    
    $service_iamge = $request->file('image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($service_iamge->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/slider/';
    $last_img =$up_location.$img_name;
    $service_iamge->move($up_location,$img_name);
    
    Service::insert([
        'title'=>$request->title,
        'short_desc'=>$request->short_desc,
        'image'=>$last_img,
        'created_at' =>Carbon::now(),
    ]);
    $notification = array(
        'message' => 'Service Inserted Successfully',
        'alert-type' => 'success'
        );
    return Redirect()->back()->with($notification);
    
    } 
    
    public function EditService($id){
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));

    }
    public function UpdateService(Request $request,$id){
        $validated = $request->validate([
            'title' =>'required|unique:services|min:4',
            'short_desc'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg'
        ],
        [
            'title.required'=>'please fill title',
            'title.unique'=>'title must be unique',
            'title.min'=>'title should be not less four character'
        ]
        );
       
        $old_image = $request->old_image;
        $service_iamge = $request->file('image');
    if($service_iamge){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($service_iamge->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img =$up_location.$img_name;
        $service_iamge->move($up_location,$img_name);
        unlink($old_image);
        Service::find($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'image'=>$last_img,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'info'
            );
        return Redirect()->back()->with($notification);
    }else{
        Service::find($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'info'
            );
        return Redirect()->back()->with($notification);
    }
    }
public function DeleteService($id){
   $service_image = Service::find($id);
   $old_image = $service_image->image;
    unlink($old_image);
    Service::find($id)->delete();
    $notification = array(
        'message' => 'Service Deleted Successfully',
        'alert-type' => 'warning'
        );
    return Redirect()->back()->with($notification);
}

    public function HomeService(){
        $services = Service::latest()->get();
        return view('pages.service');
    }
}
