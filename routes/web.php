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

Route::get('/',"IndexController@index")->name('homepage');

Route::get('/instagram',"IndexController@index")->name('instagram');
Route::get('/instagram/auth',"AddUserController@index")->name('instaAuth');

Route::post('/instagram/auth',"AddUserController@resp")->name('instaAuth');
Route::get('/instagram/addphoto',"AddPhotoController@add")->name('addphoto');