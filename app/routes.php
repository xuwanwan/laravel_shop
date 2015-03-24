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
Route::get('/cart/addCart/{id}',array('as'=>'addCart','uses'=>'CartController@addCart'));
Route::get('/cart',array('as'=>'showcart','uses'=>'CartController@showCart'));
Route::post('/cart/update',array('as'=>'cart.update','uses'=>'CartController@update'));
Route::get('/cart/remove/{id}',array('as'=>'cart.remove','uses'=>'CartController@remove'));
/*
Route::get('test', function()
{
    //$test_arr =array('a'=>'apple','b'=>'banner');
    //Cache::add('test_arr', $test_arr, '60');
    $value = Cache::get('test_arr');
    var_dump($value);
    Log::info('This is some useful information.');
    Log::debug('this is debug log');
	return View::make('test',array('user'=>'tinker','age'=>'24','sex'=>'is_man'));
});
Route::post('/foo/bar', function()
{
    var_dump($_POST);
    return 'Hello World';
});
Route::any('foo', function()
{
    //经常您需要根据路由产生 URLs，您可以通过使用 URL::to 方法：
    $url =URL::to('server/post');
    var_dump($url );
    return 'Hello World';
});
/*
//路由参数
Route::get('user/{id}', function($id)
{
    var_dump(2);
    return 'User '.$id;
});
//可选的路由参数
//可以带有name参数，如果不带，默认为null,既user/null
//usr/tinker=>输出tinker
Route::get('user/{name?}', function($name = null)
{
    return $name;
});
/*
//带默认值的可选的路由参数
Route::get('user/{name?}', function($name = 'John')
{
    return $name;
});
*/
//带正则表达式约束的路由
/*
Route::get('user/{name}', function($name)
{
    return 'name=>'.$name;
})
->where('name', '[A-Za-z]+');

Route::get('user/{id}', function($id)
{
  return 'id=>'.$id;
})
->where('id', '[0-9]+');
*/
App::before(function($request, $response)
{
    //var_dump(1);
});
App::after(function($request, $response)
{
    //var_dump(3);
});
Route::get('old/{id}', function($id)
{
  return 'id=>'.$id;
});
//定义一个路由过滤器

Route::get('user', array('before' => 'old', function()
{
    return 'You are over 200 years old!';
}));
Route::get('user/profile', array('as' => 'profile'));
$url = URL::route('profile');
$redirect = Redirect::route('profile');
$name = Route::currentRouteName();

//定义路由的控制器
Route::get('user/{id}', 'UserController@showUser');
/*
$cookie = Cookie::make('name', 'value');

return Response::make($content)->withCookie($cookie);
*/

