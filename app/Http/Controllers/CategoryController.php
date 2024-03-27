<?php

namespace App\Http\Controllers;
use App\Invitation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{  
   public function __construct(){
      $this->middleware('auth');
   }
   public function AllCat(){
   //    $initiated =  Invitation::with('user')
   //  ->where('inviter_id', Sentinel::getUser()->id)
   //  ->orderBy('id', 'desc')
   //  ->paginate(6);
      // $categories = Category::orderBy('id', 'desc')->paginate(5);
      $categories =  Category::latest()->paginate(5);
      $trashCat =  Category::onlyTrashed()->latest()->paginate(3);

         // $categories= DB::table('categories')->latest()->paginate(5);
      // $categories= DB::table('categories')
      // ->join('users','categories.user_id','users.id')
      // ->select('categories.*','users.name')
      // ->latest()
      // ->paginate(5);
   
      return view('admin.category.index',compact('categories','trashCat'));
   }

   public function AddCat(Request $request){
      $validated = $request->validate([
         'category_name' => 'required|unique:categories|max:255',
       
     ],
   //   costumizing 
     [
      'category_name.required' => 'Please input Category Name',
      'category_name.max' => 'Category less than 5',
     ]);
    //insert format, with Eloquent DB
// Category::insert([
//    'category_name'=>$request->category_name,
//    'user_id'=>Auth::user()->id,
//    'created_at'=>Carbon::now(),
// ]);
//objec format, it is more professional way
// $category = new Category;
// $category->category_name = $request->category_name;
// $category->user_id = Auth::user()->id;
// $category->save();
// using query Builder
$data = array();
$data['category_name'] = $request->category_name;
$data['user_id'] = Auth::user()->id;
DB::table('categories')->insert($data);
$notification = array(
   'message' => 'Slider Inserted Successfully',
   'alert-type' => 'success'
   );
return redirect()->back()->with($notification);

}
public function EditCat($id){
   // $categories = Category::find($id);
  $categories = DB::table('Categories')->where('id',$id)->first();
  return view('admin.category.edit', compact('categories'));
}
public function UpdateCat(Request $request,$id){
// $category = Category::find($id)->update([
//    'category_name' => $request->category_name,
// ]);
$data = array();
$data['category_name'] = $request->category_name;
$date['user_id'] = Auth::user()->id;
DB::table('categories')->where('id',$id)->update($data);
$notification = array(
   'message' => 'Category Updated Successfully',
   'alert-type' => 'info'
   );
return redirect()->route('all.category')->with($notification);
}
public function DeleteCat($id){
$category = Category::find($id)->delete();
$notification = array(
   'message' => 'Category Deleted Successfully !!',
   'alert-type' => 'warning'
   );
return redirect()->route('all.category')->with($notification);
}
public function restoreCat($id){
   $delete = Category::withTrashed()->find($id)->restore();
   $notification = array(
      'message' => 'Category Restored Successfully !!',
      'alert-type' => 'info'
      );
   return redirect()->route('all.category')->with($notification);

}
public function PDelete($id){
   $pdelete = Category::onlyTrashed()->find($id)->forceDelete();
   $notification = array(
      'message' => 'Category Deleted Successfully',
      'alert-type' => 'warning'
      );     
   return redirect()->route('all.category')->with($notification);

}
}
