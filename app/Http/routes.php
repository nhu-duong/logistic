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
Route::get('/address/new_ajax/{forceType}', ['as' => 'new_address_ajax', 'uses' => 'AddressController@ajaxNewAction']);
Route::get('/address/edit/{id}', ['as' => 'edit_address', 'uses' => 'AddressController@editAction']);
Route::post('/address/save', ['as' => 'save_address', 'uses' => 'AddressController@saveAction']);

Route::get('/agent/new_ajax', ['as' => 'new_agent_ajax', 'uses' => 'AgentController@ajaxNewAction']);
Route::post('/agent/save', ['as' => 'save_agent', 'uses' => 'AgentController@saveAction']);

Route::get('/ship/new_ajax', ['as' => 'new_ship_ajax', 'uses' => 'ShipController@ajaxNewAction']);
Route::post('/ship/save', ['as' => 'save_ship', 'uses' => 'ShipController@saveAction']);

Route::get('/port/new_ajax', ['as' => 'new_port_ajax', 'uses' => 'PortController@ajaxNewAction']);
Route::post('/port/save', ['as' => 'save_port', 'uses' => 'PortController@saveAction']);

Route::get('/containers/new_ajax/{orderId}', ['as' => 'new_container_ajax', 'uses' => 'ContainersController@ajaxNewAction']);
Route::post('/containers/save', ['as' => 'save_container', 'uses' => 'ContainersController@saveAction']);
Route::delete('/containers/delete/{id}', ['as' => 'delete_container', 'uses' => 'ContainersController@deleteAction']);

Route::post('/attachment/upload/{orderId}', ['as' => 'upload_attachment', 'uses' => 'AttachmentsController@uploadAction']);
Route::get('/attachment/download/{id}', ['as' => 'download_attachment', 'uses' => 'AttachmentsController@downloadAction']);
Route::get('/attachment/delete/{id}', ['as' => 'delete_attachment', 'uses' => 'AttachmentsController@deleteAction']);