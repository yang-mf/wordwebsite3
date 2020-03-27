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

Route::get('/index','index\IndexController@index');
Route::get('/','index\IndexController@index');
Route::get('/auth','index\IndexController@auth');
Route::get('/aouth','index\IndexController@aouth');
Route::get('/forlogin','index\IndexController@forlogin');

//发送短信验证码
Route::post('/login/code','aliyun@code');

Route::post('/find/word','FindController@word');

//登录页面显示
Route::get('/login/wechat','index\LoginController@wechat');
Route::get('/login/tel','index\LoginController@tel');
Route::get('/login/user','index\LoginController@user');
Route::post('/login/userdologin','index\LoginController@userdologin');

