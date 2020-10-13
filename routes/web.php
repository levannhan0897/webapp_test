<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'post_register']);
Route::get('/call-city',[UserController::class,'call_city']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/site-inspection-detail',[UserController::class,'site_inspection_detail']);
Route::post('/update-inspection-detail',[UserController::class,'update_inspection_detail']);
Route::get('/get-inspection-detail/{id}',[UserController::class,'get_inspection_detail']);
Route::get('/show-list-inspec',[UserController::class,'show_list_inspec']);
Route::post('/save-img-canvar',[UserController::class,'save_img_canvar']);