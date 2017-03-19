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

//webhook 1

//获取栏目列表
$api->get('class', 'IndexController@getClasses');
//分页获取所有的文章
$api->get('articles/{classes?}/{offset?}/{limit?}', 'IndexController@getArticles');
//通过文章slug获取文章详情
$api->get('byslug/{slug}', 'IndexController@getArticleBySlug');
//获取友情链接
$api->get('links', 'IndexController@getLinks');


$api->post('token', 'UserController@token');    //获取token
$api->post('refresh-token', 'UserController@refershToken'); //刷新token
$api->group(['middleware' => ['auth:api']], function($api) {
    $api->post('logout', 'UserController@logout');    //登出
    $api->get('me', 'UserController@me');    //关于我
});