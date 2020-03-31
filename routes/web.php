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
//显示首页
Route::get('/index','index\IndexController@index');
Route::get('/','index\IndexController@index');
//发送短信验证码
Route::post('/login/sendsms','aliyun@sendsms');
//搜索
Route::post('/find/word','FindController@word');
//登录页面显示
Route::get('/login/wechat','index\LoginController@wechat');
Route::get('/aouth','index\LoginController@aouth');
Route::get('/forlogin','index\LoginController@forlogin');
Route::get('/login/tel','index\LoginController@tel');
Route::post('/login/teldologin','index\LoginController@teldologin');
Route::get('/login/user','index\LoginController@user');
Route::get('/auth','index\IndexController@auth');
Route::post('/login/userdologin','index\LoginController@userdologin');
//清空session数据
Route::get('/session','index\IndexController@session');
//详情页
Route::get('/detail','detail\DetailController@detail');
//支付路由
Route::get('/pay/show','AlipayController@show');
Route::post('/pay/pay','AlipayController@pay');

//注册作者
Route::get('/zuozhe/zhuce','zuozhe\LoginController@zhuce');
Route::post('/zuozhe/dozhuce','zuozhe\LoginController@dozhuce');
Route::get('/zuozhe/denglu','zuozhe\LoginController@denglu');
Route::post('/zuozhe/dodenglu','zuozhe\LoginController@dodenglu');
Route::get('/zuozhe/add','zuozhe\LoginController@add');
Route::post('/zuozhe/doadd','zuozhe\LoginController@doadd');




//后台管理登录
Route::get('/admin/zhuce','admin\LoginController@zhuce');
Route::post('/admin/dozhuce','admin\LoginController@dozhuce');
Route::get('/admin/denglu','admin\LoginController@denglu');
Route::post('/admin/dodenglu','admin\LoginController@dodenglu');
Route::get('/admin/show','admin\LoginController@show');
Route::post('/admin/change','admin\LoginController@change');






