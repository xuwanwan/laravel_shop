<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/','HomeController@index');
Route::get('/c/{id}', array('as'=>'catagory','uses'=>'HomeController@category'));
Route::get('/p/{id}','HomeController@product');
Route::group(array(), function () {
    Route::get('/cart/addCart/{id}',array('as'=>'addCart','uses'=>'CartController@addCart'));
    Route::get('/cart',array('as'=>'showcart','uses'=>'CartController@showCart'));
    Route::post('/cart/update',array('as'=>'cart.update','uses'=>'CartController@update'));
    Route::get('/cart/remove/{id}',array('as'=>'cart.remove','uses'=>'CartController@remove'));
    Route::get('/checkout/',array('as'=>'cart.checkout','uses'=>'CartController@checkout'));
    Route::post('/confim/',array('as'=>'cart.confim','uses'=>'CartController@confim'));

});