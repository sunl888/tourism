<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
$api->get('class', 'IndexController@getClasses');

$api->post('token', 'UserController@token');    //获取token
$api->post('refresh-token', 'UserController@refershToken'); //刷新token
$api->group(['middleware' => ['auth:api']], function($api) {
    $api->post('logout', 'UserController@logout');    //登出
    $api->get('me', 'UserController@me');    //关于我
});