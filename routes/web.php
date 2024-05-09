<?php

use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ChangePass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeProfile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\PriceController;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register  routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $about = DB::table('abouts')->first();
    $services = DB::table('services')->get();
    $images = DB::table('multipics')->get();
    $brands = DB::table('brands')->get();
    return view('home',compact('about','images','brands','services'));
})->name('home');

Route::get('/about', function () {
    return view('about');
});
// ->middleware('check');  
//Category Route
 Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category'); 
 Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category'); 
 Route::get('/category/edit/{id}',[CategoryController::class, 'EditCat']); 
 Route::post('/category/update/{id}',[CategoryController::class, 'UpdateCat']); 
 Route::get('/category/delete/{id}',[CategoryController::class, 'DeleteCat']);
 Route::get('/category/restore/{id}',[CategoryController::class, 'restoreCat']);
 Route::get('/category/Pdelete/{id}',[CategoryController::class, 'PDelete']);

 //Brand route
 Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand'); 
 Route::post('/brand/all',[BrandController::class, 'StoreBrand'])->name('store.brand');
 Route::get('/brand/edit/{id}',[BrandController::class, 'EditBrand']);
 Route::post('/brand/update/{id}',[BrandController::class, 'UpdateBrand']);
 Route::get('/brand/delete/{id}',[BrandController::class, 'DeleteBrand']);

 //Multi Image Route
  Route::get('/multi/image',[MultiImageController::class,'Multpic'])->name('multi.image');
  Route::post('/add/image',[MultiImageController::class,'StoreImage'])->name('store.image');
  Route::get('/add/portfolio',[MultiImageController::class,'AddPortfolio'])->name('add.potfolio');
  Route::post('/store/portfolio',[MultiImageController::class,'StoreImage'])->name('store.portfolio');
  
  // admin contact Route
  Route::get('/admin/contact',[ContactController::class,'AdminContact'])->name('admin.contact');
  Route::get('/add/contact',[ContactController::class,'AddAdminContact'])->name('add.contact');
  Route::post('/store/contact',[ContactController::class,'StoreAdminContact'])->name('store.contact');
  Route::get('/edit/contact/{id}',[ContactController::class,'EditAdminContact']);
  Route::post('/update/contact/{id}',[ContactController::class,'UpdateAdminContact']);
  Route::get('/delete/contact/{id}',[ContactController::class,'DeleteAdminContact']);

// user contact form Rout

Route::post('send/contact_form',[ContactformController::class,'ContactForm'])->name('send.contact_form');
Route::get('user/message',[ContactformController::class,'ContactMessage'])->name('user.message');
Route::get('/delete/contact/{id}',[ContactformController::class,'DeleteMessage']);
 Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
    //   Eloquent DB format
        // $users = User::all();
        // $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});  
 Route::get('/login',[UserController::class,'UserLogin'])->name('login');
 Route::get('/user/logout',[UserController::class, 'LogoutUser'])->name('user.logout'); 
 Route::get('/register',[UserController::class,'Register']);
 Route::post('user/register',[UserController::class,'RegisterUser'])->name('register');

Route::get('users/all',function(){
    $users = DB::table('users')->get();
return view('dashboard',compact('users'));
})->name('users');

//slider route
 Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
 Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
 Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');
 Route::get('/slider/edit/{id}',[HomeController::class,'EditSlider']);
 Route::post('/slider/update/{id}',[HomeController::class,'UpdateSlider']);
 Route::get('/slider/delete/{id}',[HomeController::class,'DeleteSlider']);

 //about route
 Route::get('/all/about',[AboutController::class,'AllAbout'])->name('all.about');
 Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
 Route::post('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
 Route::get('/edit/about/{id}',[AboutController::class,'EditAbout']);
 Route::post('/update/about/{id}',[AboutController::class,'UpdateAbout']);
 Route::get('/delete/about/{id}',[AboutController::class,'DeleteAbout']);

// service route
Route::get('/all/service',[ServiceController::class,'AllService'])->name('all.service');
Route::get('/add/service',[ServiceController::class,'AddService'])->name('add.service');
Route::post('/store/service',[ServiceController::class,'StoreService'])->name('store.service');
Route::get('/edit/service/{id}',[ServiceController::class,'EditService']);
Route::post('/service/update/{id}',[ServiceController::class,'UpdateService']);
Route::get('/delete/service/{id}',[ServiceController::class,'DeleteService']);

// fontend Home pages
Route::get('portfoloio', [PortfolioController::class,'HomePortfolio']);
Route::get('/pages/about', [AboutController::class,'HomeAbout']);
Route::get('/pages/service', [ServiceController::class,'HomeService']);
Route::get('pages/contact', [ContactController::class,'HomeContact'])->name('pages.contact');

// change password and user profile
 Route::get('/change/password',[ChangePass::class,'CPassword'])->name('change.password');
 Route::post('/update/password',[ChangePass::class,'UpdatePasword'])->name('password.update');
 // user profile
 Route::get('/user/profile',[ChangeProfile::class,'PUpdate'])->name('profile.update');
 Route::post('/user/profile/update',[ChangeProfile::class,'ProfileUpdate'])->name('update.user.profile');

 //pricing route
  Route::get('pricing',[PriceController::class,'index'])->name('price');
  
  //Blog route
 Route::get('/blog',[BlogController::class,'index'])->name('blog');



