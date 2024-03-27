<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
    public function AllBrand(){
        // Eloquent ORM FORMAt
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }
    public function StoreBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:png,jpg,Jpeg',
        ],
        //customizing validation to your own way
        [
        'brand_name.required' => 'please fill brand name',
        'brand_name.min' => 'brand name should not be less than 4',
        'brand_name.unique' => 'brand name existing',
        'brand_image.min' => 'brand image longer than 4 character',       
         ]
        );
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name; 
        $brand_image->move($up_location,$img_name);
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
        'message' => 'Brand Inserted Successfully',
        'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }
    public function EditBrand($id){
       $brand  = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }
    public function UpdateBrand(Request $request, $id){
    
        $validated = $request->validate([
            'brand_name' => 'required|min:4',
            // 'brand_image' => 'required|mimes:png,jpg.Jpeg',
        ],
        //customizing validation to your own way
        [
        'brand_name.required' => 'please fill brand name',
        'brand_image.min' => 'brand image longer than 4 character',       
         ]
        );
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

      if($brand_image){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name; 
        $brand_image->move($up_location,$img_name);
        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' =>Carbon::now(),
        ]);
      }
      else{
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,          
            'created_at' =>Carbon::now(),
        ]);
      }
      $notification = array(
        'message' => 'Brand Inserted Successfully',
        'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function DeleteBrand($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        $brand = Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully !!',
            'alert-type' => 'warning'
            );
            return Redirect()->back()->with($notification);
    
    }
    
}
