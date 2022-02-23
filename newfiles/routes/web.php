<?php

use App\Models\Article;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/about', function () {
    return view('FrontEnd.about');
});


Route::get('/agents', function () {
    return view('FrontEnd.agents');
});

Route::get('/blog', function () {
    return view('FrontEnd.blog');
});

Route::get('/contact', function () {
    return view('FrontEnd.contact');
});

Route::get('/home', function () {
    return view('FrontEnd.home');
});



// Route::get('/buysalerent', function () {
//     return view('FrontEnd.buysalerent');
// });

Route::get('/property-detail', function () {
    return view('FrontEnd.property-detail');
});

Route::get('/blogdetail', function () {
    return view('FrontEnd.blogdetail');
});

Route::get('/register', function () {
    return view('FrontEnd.register');
});

Route::get('/dashboard', function () {
    return view('FrontEnd.dashboard');
});

// Route::get('/loginheader', function () {
//     return view('FrontEnd.loginheader');
// });


Route::get('/',[App\Http\Controllers\EstateController::class, 'index']);

// Route::post('get-userdata', function (Request $request) {

//     $name1 = $request->input('form_name');
//     $emailid = $request->input('form_email');
//     $pass = $request->input('form_pass');
//     $cp = $request->input('cp');
//     $phone = $request->input('form_phone');
//     $mes = $request->input('form_message');

//     return "Hi, your name is".$name1."".$emailid."".$pass."".$cp."".$phone."".$mes;
// });

// Route::post('/create', function () {
//       $sale = new Article();
//       $sale->name=request('form_name');
//       $sale->emailid=request('form_email');
//       $sale->password1=request('form_pass');
//       $sale->confirmpasswd=request('cp');
//       $sale->contactno=request('form_phone');
//       $sale->message=request('form_message');
//       $sale->save();

//       return redirect('/buysalerent');
// });
Route::get('/buysalerent',[App\Http\Controllers\AuthController::class, 'buysalerent'])->middleware('isLoggedIn');
Route::get('/saleuser',[App\Http\Controllers\AuthController::class, 'saleUser'])->middleware('isLoggedIn');

Route::get('/login',[App\Http\Controllers\AuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/register',[App\Http\Controllers\AuthController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/sale-user',[App\Http\Controllers\AuthController::class, 'saleImage'])->name('sale-user');
Route::post('/create',[App\Http\Controllers\AuthController::class, 'create'])->name('create');
Route::post('/login-user',[App\Http\Controllers\AuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard',[App\Http\Controllers\AuthController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout',[App\Http\Controllers\AuthController::class, 'logout']);

Route::post('/contact-user',[App\Http\Controllers\AuthController::class, 'contactUser'])->name('contact-user');
Route::get('/propertygallery',[App\Http\Controllers\AuthController::class, 'gallery']);

Route::get('/form_upload',[App\Http\Controllers\FormController::class, 'index']);
Route::post('upload_data',[App\Http\Controllers\FormController::class, 'store']);

