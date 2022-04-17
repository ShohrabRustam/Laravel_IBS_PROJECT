<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
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

// Route for the SuperAdminController

Route::post('adminSignup',[AdminController::class,'_adminSignup']);
Route::post('superadminLogin',[SuperAdminController::class,'_login']);


// Route for Admin
Route::post('adminLogin',[AdminController::class,'_login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

