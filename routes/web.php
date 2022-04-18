<?php

use App\Http\Controllers\DeskboardCommonController;
use App\Http\Controllers\HelpController;
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
Route::post('/help',[HelpController::class,'_help']);
Route::get('/signup',[DeskboardCommonController::class,'_signup']);
Route::get('/login',[DeskboardCommonController::class,'_login']);
Route::get('/lifeInsurance',[DeskboardCommonController::class,'_life']);
Route::get('/healthInsurance',[DeskboardCommonController::class,'_health']);
Route::get('/carInsurance',[DeskboardCommonController::class,'_car']);
Route::get('/bikeInsurance',[DeskboardCommonController::class,'_bike']);
