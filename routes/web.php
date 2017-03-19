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

Auth::routes();

// Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::group(['namespace' => 'Admin'], function()
{
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