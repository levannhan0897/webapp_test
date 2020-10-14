<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\SalerController;
use App\Http\Controllers\Api\InstallerController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ForgotPasswordController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login'])->name('loginApi');
Route::post('register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', [UserController::class, 'details'])->name('details');
});
//reset password
Route::post('reset', [ForgotPasswordController::class, 'getForgotPassword'])->name('resetPassword');
Route::post('add/token', [ForgotPasswordController::class, 'store'])->name('addToken');

//site inspection
Route::get('getListUser', [SalerController::class, 'getListUser'])->name('getListUser');
Route::put('editUser/{id}', [SalerController::class, 'updateUser'])->name('updateUser');
Route::get('getDetailUser/{id}', [SalerController::class, 'getDetailUser']);