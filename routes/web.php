<?php

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
/*DB::listen(function ($event){
    dump($event->sql);
});*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/task/{id}/delete','TaskController@destroy')->middleware('auth');
Route::resource('/task', 'TaskController', [
    'except' => ['destroy']
    ])->middleware('auth');
