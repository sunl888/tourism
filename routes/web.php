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

// Controllers Within The "App\Http\Controllers\Admin" Namespace

Route::group(['namespace' => 'Admin'], function() {
    //登录
    Route::get('login' ,'AuthenticateController@login')->name('login');
    Route::get('logout' ,'AuthenticateController@logout')->name('logout');
    Route::post('login' ,'AuthenticateController@doLogin')->name('login');

    Route::group(['middleware' =>'auth'], function () {
        //后台主页
        Route::get('/', 'IndexController@index');
        Route::get('main', 'IndexController@main')->name('main');
        Route::get('column', 'IndexController@column')->name('column');
        Route::get('article', 'IndexController@article')->name('article');
        Route::get('link', 'IndexController@link')->name('link');
        Route::get('webset', 'IndexController@webset')->name('webset');
        Route::get('mine', 'IndexController@mine')->name('mine');
        Route::get('add_article', 'IndexController@addArticle')->name('add_article');
        Route::get('audit', 'ArticleController@audit')->name('audit');

        //分类
        Route::group(['prefix' => 'class'], function () {
            Route::post('store', 'ClassesController@store')->name('class/store');
            Route::post('update', 'ClassesController@update')->name('class/update');
            Route::get('delete/{id}', 'ClassesController@delete');
        });

    });

    //网站信息
    Route::group(['prefix' => 'webinfo'], function()
    {
        //webinfo/store/{id}
        Route::get('show', 'WebInfoController@show');
        Route::post('update/{id}', 'WebInfoController@update');
        Route::post('delete/{id}', 'WebInfoController@delete');
    });
    //友情链接
    Route::group(['prefix' => 'link'], function ()
    {
        Route::post('store', 'LinkController@store');
        Route::post('update/{id}', 'LinkController@update');
        Route::post('delete/{id}', 'LinkController@delete');
        Route::get('show', 'LinkController@show');
    });



});