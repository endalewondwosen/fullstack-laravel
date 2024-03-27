<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SebastianBergmann\CodeUnit\FunctionUnit;

class HomeController extends Controller
{
public function HomeSlider(){
    $sliders = Slider::latest()->get();
    return view('admin.slider.index', compact('sliders'));
}
public function AddSlider(){
return view('admin.slider.creat');
}

public function StoreSlider(Request $request){
$validated = $request->validate([
    'title' =>'required|unique:sliders|min:4',
    'description'=>'required',
    'image'=>'required|mimes:png,jpg,jpeg'
],
[
    'title.required'=>'please fill title',
    'title.unique'=>'title must be unique',
    'title.min'=>'title should be not less four character'
]
);

$slider_iamge = $request->file('image');
$name_gen = hexdec(uniqid());
$img_ext = strtolower($slider_iamge->getClientOriginalExtension());
$img_name = $name_gen.'.'.$img_ext;
$up_location = 'image/slider/';
$last_img =$up_location.$img_name;
$slider_iamge->move($up_location,$img_name);

Slider::insert([
    'title'=>$request->title,
    'description'=>$request->description,
    'image'=>$last_img,
    'created_at' =>Carbon::now(),
]);
$notification = array(
    'message' => 'Slider Inserted Successfully',
    'alert-type' => 'success'
    );
return Redirect()->back()->with($notification);

}

public function EditSlider($id)
{
    $slider = Slider::find($id); 
return view('admin.slider.edit',compact('slider'));
}
public function UpdateSlider(Request $request, $id){

    $validated = $request->validate([
        'title' => 'required|min:4',
        'image' => 'required|mimes:png,jpg,Jpeg',
        'description'=>'required|min:15',
    ],
    //customizing validation to your own way
    [
    'title.required' => 'please fill slider title',
    'image.min' => 'slider image longer than 4 character',       
    'description.min' => 'slider description longer than 15 character', 
    ]
    );
    $old_image = $request->old_image;
    $slider_image = $request->file('image');
  if($slider_image){
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($slider_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/slider/';
    $last_img = $up_location.$img_name; 
    $slider_image->move($up_location,$img_name);
    unlink($old_image);
    Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->desciption,
        'image' => $last_img,
        'created_at' =>Carbon::now(),
    ]);
  }
  else{
    Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->desciption,
    ]);
  }
  $notification = array(
    'message' => 'Slider Updated Successfully',
    'alert-type' => 'info'
    );
return Redirect()->back()->with($notification);

}
public function DeleteSlider($id){
    $slider = Slider::find($id);
    $old_image = $slider->image;
    unlink( $old_image);

$slider = Slider::find($id)->delete();
$notification = array(
    'message' => 'Slider Deleted Successfully',
    'alert-type' => 'warning'
    );
return Redirect()->back()->with($notification);

}
}
 