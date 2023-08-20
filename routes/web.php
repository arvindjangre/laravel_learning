<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/data', [IndexController::class, 'index']);
Route::get('/group/{id}', [IndexController::class, 'group']);

Route::middleware('guard')->group(function() {
  //protected by middle ware
});
Route::get('/no-acess', function(){
  echo "you don't have access"; die;
});



Route::get('/login', function() {
  session()->put('user_id', 1);
  return redirect('/');
});

Route::get('/logout', function() {
  session()->forget('user_id');
  return redirect()->back();
});



Route::get('/', function () {
  return view('welcome');
});
Route::get('/register', [RegistrationController::class, 'index']);

Route::group(['prefix' => '/customer'], function () {
  Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
  Route::get('', [CustomerController::class, 'index']);
  Route::get('', [CustomerController::class, 'view']);
  Route::get('/view', [CustomerController::class, 'view']);
  Route::post('', [CustomerController::class, 'store']);
  Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
  Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
  Route::get('/force-delete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.force-delete');
  Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
  Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
  Route::get('/trash', [CustomerController::class, 'trash']);
});

Route::get('get-all-session', function () {
  $session = session()->all();
  p($session);
});

Route::get('set-session', function (Request $request) {
  $request->session()->put("user_name", "ws-cube tect");
  $request->session()->put("user_id", "123");
  $request->session()->flash('status', 'Success');
  return redirect('get-all-session');
});

Route::get('destroy-session', function () {
  session()->forget('user_name');
  session()->forget('user_id');
  return redirect('get-all-session');
});


Route::get('/upload', function () {
  return view('upload');
});

Route::post('/upload', [StudentController::class, 'upload']);

Route::get('/{lang?}', function($lang = null) {
  App::setLocale($lang);
  return view('welcome');
});

