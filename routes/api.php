<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
////////////////////////
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

Route::post('/register-api',[UserApiController::class,'register_api']);
Route::post('/confirm-account-api',[UserApiController::class,'confirm_account_api']);
Route::post('/login-api',[UserApiController::class,'login_api']);
Route::post('/forgot-password-api',[UserApiController::class,'forgot_password_api']);
Route::get('/get-states-api',[UserApiController::class,'get_states_api']);
Route::post('/get-cities-api',[UserApiController::class,'get_cities_api']);
Route::get('/get-inspection-api',[UserApiController::class,'get_inspection_api']);
Route::post('/update-inspection-api',[UserApiController::class,'update_inspection_api']);
Route::post('/save-img-canvar-api',[UserApiController::class,'save_img_canvar_api']);
Route::post('/update-inspection-detail-document-api',[UserApiController::class,'update_inspection_detail_document_api']);
Route::post('/remove-document-api',[UserApiController::class,'remove_document_api']);
Route::post('/save-area',[UserApiController::class,'save_area']);
Route::post('/delete-area',[UserApiController::class,'delete_area']);
Route::post('/save-location',[UserApiController::class,'save_location']);
//////////////////////////
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