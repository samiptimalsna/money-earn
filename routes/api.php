<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

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

Route::post('/register',[UserController::class, 'register']);

Route::post('/login',[AccessTokenController::class,'issueToken'])->middleware(['api-login','throttle']);
Route::get('/get_data',[UserController::class, 'getData']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
