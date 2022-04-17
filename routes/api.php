<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyPolicyController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route for the User

Route::post('signup',[UserController::class,'_signup']);
Route::post('login',[UserController::class,'_login']);
Route::post('update',[UserController::class,'_update']);
Route::post('delete',[UserController::class,'_delete']);
Route::post('signup',[UserController::class,'_signup']);
Route::get('users',[UserController::class,'_users']);
Route::get('userLogout',[UserController::class,'_logout']);

// Route for the SuperAdminController

Route::post('adminSignup',[AdminController::class,'_signup']);
Route::post('superadminLogin',[SuperAdminController::class,'_login']);
Route::post('adminUpdate',[UserController::class,'_update']);
Route::post('adminDelete',[UserController::class,'_delete']);
Route::post('adminSignup',[UserController::class,'_signup']);
Route::get('adminLogout',[UserController::class,'_logout']);

// Route for Admin
Route::post('adminLogin',[AdminController::class,'_login']);
Route::get('superadminLogout',[UserController::class,'_logout']);

// Route for Company
Route::post('companyRegistration',[CompanyController::class,'_register']);
Route::post('companyDelete',[CompanyController::class,'_delete']);
Route::post('companyUpdate',[CompanyController::class,'_update']);
Route::get('companies',[CompanyController::class,'_companies']);

// Route for the CompanyPolicies
Route::post('policyRegisteration',[CompanyPolicyController::class,'_register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

