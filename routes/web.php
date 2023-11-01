<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return Redirect('/admin/login');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::prefix('/admin')->group(function(){
    Route::match(['get','post'],'login',[AdminController::class,'login']);
    Route::group(['middleware'=>['admin']],function(){
    Route::get('dashboard',[AdminController::class,'index']);
    Route::get('logout',[AdminController::class,'logout']);
    Route::resource('company',CompanyController::class);
    Route::resource('employee',EmployeeController::class);

       Route::controller(StripePaymentController::class)->group(function(){
           Route::get('stripe', 'stripe');
           Route::post('stripe', 'stripePost')->name('stripe.post');
       });

    });
 });


