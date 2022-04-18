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

Route::get('/', [DeskboardCommonController::class,'index']);
Route::get('/contact', [DeskboardCommonController::class,'contact']);
Route::get('/about',[DeskboardCommonController::class,'about']);
Route::get('/help',[DeskboardCommonController::class,'help']);
Route::post('/help',[HelpController::class,'help']);
