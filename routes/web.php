<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\petController;
use App\Http\Controllers\serviceController;
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
Route::get('/', function(){
    return view('home');
});

Route::resource('/owner', ownerController::class);
Route::resource('/pet', petController::class);
Route::resource('/service', serviceController::class);
