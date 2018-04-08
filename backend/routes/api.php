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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/token', 'Api\ApiLoginController@authenticate');// login App -> create token
Route::post('auth/refresh', 'Api\ApiLoginController@refreshToken');// logout App ->refresh token

Route::post('/auth/register','Api\UserController@store');

Route::get('/product/list','Api\ProductController@index');
Route::group(['middleware' => ['auth:api']], function(){

	Route::post('get-details', 'API\PassportController@getDetails');

	Route::group(['prefix'=>'user', 'namespace'=>'Api'], function(){

		// Route::get('/', 'UserController@index')->name('list.user');
		// Route::get('/create','UserController@create')->name('create.user');
		// Route::post('/store','UserController@store')->name('store.user');
		// Route::get('/edit/{id}','UserController@edit')->name('edit.user');
		Route::get('/detail','UserController@show')->name('detail.user');
		Route::post('/update','UserController@update')->name('update.user');
		Route::delete('/destroy','UserController@destroy')->name('destroy.user');
		Route::post('/change-password','UserController@changePassword');


	});


	Route::group(['prefix'=>'product', 'namespace'=>'Api'], function(){

		// Route::get('/', 'UserController@index')->name('list.user');
		// Route::get('/create','UserController@create')->name('create.user');
		// Route::post('/store','UserController@store')->name('store.user');
		// Route::get('/edit/{id}','UserController@edit')->name('edit.user');
		Route::get('/detail','UserController@show')->name('detail.user');
		Route::post('/update','UserController@update')->name('update.user');
		Route::delete('/destroy','UserController@destroy')->name('destroy.user');


	});
});
