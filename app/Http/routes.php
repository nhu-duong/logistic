<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	return redirect('/home');
});
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/resendEmail', 'Auth\AuthController@resendEmail');
Route::get('/activate/{code}', 'Auth\AuthController@activateAccount');
Route::post('/home/add-record', 'HomeController@postAddRecord');
Route::get('/home/add-record', 'HomeController@getAddRecord');
Route::get('/home/list-record', 'HomeController@getListRecord');
Route::post('/image/add-record', 'ImageController@saveImage');
Route::post('/auth/user-info', 'Auth\AuthController@postUserInfo');

Route::get('/orders', ['as' => 'list_orders', 'uses' => 'OrdersController@index']);
Route::get('/orders/edit/{orderId}', ['as' => 'edit_order', 'uses' => 'OrdersController@getEditOrder']);
Route::post('/orders/save/{orderId}', ['as' => 'save_order', 'uses' => 'OrdersController@postSaveOrder']);

Route::get('/address', ['as' => 'list_address', 'uses' => 'AddressController@indexAction']);
Route::get('/address/new', ['as' => 'new_address', 'uses' => 'AddressController@newAction']);
Route::get('/address/edit/{id}', ['as' => 'edit_address', 'uses' => 'AddressController@editAction']);
Route::post('/address/save', ['as' => 'save_address', 'uses' => 'AddressController@saveAction']);