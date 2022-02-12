<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\petController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\consultationController;
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

Route::resource('/owner', ownerController::class)->middleware('isLoggedIn');
Route::resource('/pet', petController::class)->middleware('isLoggedIn');
Route::resource('/service', serviceController::class)->middleware('isLoggedIn');
Route::resource('/consultation', consultationController::class)->middleware('isLoggedIn');
Route::get('/search', [consultationController::class,'search'])->middleware('alreadyLoggedIn');

Route::get('/login', [employeeController::class,'login'])->middleware('alreadyLoggedIn');
Route::post('/check', [employeeController::class,'check'])->name('check');
Route::get('/dashboard', [employeeController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [employeeController::class,'logout'])->middleware('isLoggedIn');
Route::resource('/employee', employeeController::class)->middleware('isLoggedIn');
Route::get('/employee/create', [employeeController::class,'create'])->middleware('alreadyLoggedIn');