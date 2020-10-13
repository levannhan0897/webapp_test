<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;

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