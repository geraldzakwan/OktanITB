<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Homepage / register / login
Route::get('/', 'Controller@index');

//Untuk ke page register
Route::get('register', 'Controller@getRegister');
//Untuk save akun ke database
Route::post('register', 'Controller@postRegister');

//Untuk ke page login
Route::get('login', 'Controller@getLogin');
//Untuk sign in
Route::post('login', 'Controller@postLogin');

//Untuk ke page login, clear session
Route::get('logout', 'Controller@logout');

//Dashboard peserta

//Edit
Route::get('editProfile', 'Controller@getEditProfile');
Route::post('editProfile', 'Controller@postEditProfile');

//Upload image
Route::get('uploadBuktiPembayaran', 'Controller@getUploadBuktiPembayaran');
Route::post('uploadBuktiPembayaran', 'Controller@postUploadBuktiPembayaran');

//Untuk AJAX validation
Route::get('validate', 'Controller@validate');
Route::post('validate', 'Controller@validate');

//Untuk AJAX validation
Route::get('checkIfExist', 'Controller@checkIfExist');
Route::post('checkIfExist', 'Controller@checkIfExist');


