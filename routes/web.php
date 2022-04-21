<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDaskboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeskboardCommonController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DeskboardCommonController::class,'_index']);
Route::get('/contact', [DeskboardCommonController::class,'_contact']);
Route::get('/about',[DeskboardCommonController::class,'_about']);
Route::get('/help',[DeskboardCommonController::class,'_help']);
Route::post('/help',[HelpController::class,'_help'])->name('help');
Route::get('/signup',[DeskboardCommonController::class,'_signup'])->middleware('userLogin');
Route::post('/signup',[UserController::class,'_signup'])->name('signup');
Route::get('/login',[DeskboardCommonController::class,'_login'])->middleware('userLogin');
Route::post('/login',[UserController::class,'_login'])->name('login');
Route::get('/logout',[UserController::class,'_logout'])->name('logout');
Route::get('/lifeInsurance',[DeskboardCommonController::class,'_life']);
Route::get('/healthInsurance',[DeskboardCommonController::class,'_health']);
Route::get('/carInsurance',[DeskboardCommonController::class,'_car']);
Route::get('/bikeInsurance',[DeskboardCommonController::class,'_bike']);


Route::get('/adminHome',[AdminDaskboardController::class,'_index']);
Route::get('/adminLogin',[AdminDaskboardController::class,'_login'])->middleware('adminLogin');
Route::post('/adminLogin',[AdminController::class,'_login'])->middleware('adminLogin');
Route::get('/requestPage',[AdminDaskboardController::class,'_request']);
Route::get('/companies',[AdminDaskboardController::class,'_companies']);
Route::get('/addCompany',[AdminDaskboardController::class,'_addCompany']);
Route::post('/addCompany',[CompanyController::class,'_register'])->name('addCompany');
Route::get('/adminLogout',[AdminController::class,'_logout']);
Route::get('/claimPage',[AdminDaskboardController::class,'_claim']);

Route::get('/superadminHome',[AdminDaskboardController::class,'_homeSuperadmin']);
Route::get('/usersList',[AdminDaskboardController::class,'_users']);
Route::get('/adminsList',[AdminDaskboardController::class,'_admins']);
Route::get('/superadminLogin',[AdminDaskboardController::class,'_loginSuperadmin']);
Route::post('/superadminLogin',[SuperAdminController::class,'_login'])->name('superadminLogin');
Route::get('/superadminLogout',[SuperAdminController::class,'_logout']);
Route::get('/adminSignup',[AdminDaskboardController::class,'_signupAdmin'])->middleware('adminLogin');
Route::post('/adminSignup',[AdminController::class,'_signup'])->name('adminSignup');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/forgetpassword',[UserController::class,'_showForgotPasswordForm']);

Route::post('/forgetpassword',[UserController::class,'_sendResetLink'])->name('forgetPassword');

// Route::get('/resetpassword/{token}',[UserController::class,'_showResetForm']);

Route::get('/resetpassword/{token?}',[UserController::class,'_showResetForm'])->name('resetpassword');


Route::post('/resetpassword',[UserController::class,'_resetForm'])->name('resetpassword');












Route::fallback(function () {
    return view('error');
});
