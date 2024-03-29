<?php

use App\Task_detail;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//});


Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Auth\AuthController@register');
    Route::post('login', 'Auth\AuthController@login');

});

Route::get('task', 'TaskController@getAllTask')->middleware('auth:api');
