<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailOpenController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['web']], function () {
    Route::get('/users/auth', [AuthController::class, 'auth']);
    Route::get('/users/yauth', [AuthController::class, 'yauth']);
});




Route::get('getimage', [EmailOpenController::class, 'update_email']);

Route::get('getimage', [EmailOpenController::class, 'update_email']);

Route::get('create', [EmailOpenController::class, 'createImage']);

