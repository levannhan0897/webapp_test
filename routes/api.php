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