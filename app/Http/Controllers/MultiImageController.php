<?php

namespace App\Http\Controllers;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MultiImageController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
     }
    public function multpic(){
        $images = Multipic::all();
     return view('admin.multipic.index',compact('images'));   
    }
public function StoreImage(Request $request){
   
   
    $validated = $request->validate([
        'image' => 'required|mimes:png,jpg,Jpeg',
    ],
    );
    $image = $request->file('image');
   
 foreach($image as $multi_image){
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($multi_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/multi/';
    $last_img = $up_location.$img_name; 
    $multi_image->move($up_location,$img_name);
    Multipic::insert([
        'image' => $last_img,
        'created_at' =>Carbon::now(),
    ]);
} //end of foreach 
return Redirect()->route('multi.image')->with('success','Portfolio Inserted Successfully');

  } 
public function AddPortfolio(){

   return view('admin.multipic.create'); 
}



}
    

