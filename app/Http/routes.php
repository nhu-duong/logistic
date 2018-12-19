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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/products', 'ProductController@index');
Route::get('/products/purchase', 'ProductController@purchase');
Route::get('/products/activate', 'ProductController@activate');

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/home/add-record', 'HomeController@postAddRecord');
Route::get('/home/add-record', 'HomeController@getAddRecord');
Route::get('/home/list-record', 'HomeController@getListRecord');
Route::post('/image/add-record', 'ImageController@saveImage');
Route::post('/auth/user-info', 'Auth\AuthController@postUserInfo');

Route::auth();
Route::get('/orders', ['as' => 'list_orders', 'uses' => 'OrdersController@index']);
Route::get('/orders/edit/{orderId}', ['as' => 'edit_order', 'uses' => 'OrdersController@getEditOrder']);
Route::post('/orders/save/{orderId}', ['as' => 'save_order', 'uses' => 'OrdersController@postSaveOrder']);
Route::get('/orders/test', ['as' => 'test_order', 'uses' => 'OrdersController@test']);

Route::get('/address', ['as' => 'list_address', 'uses' => 'AddressController@indexAction']);
Route::get('/address/new', ['as' => 'new_address', 'uses' => 'AddressController@newAction']);
Route::get('/address/new_ajax/{forceType}', ['as' => 'new_address_ajax', 'uses' => 'AddressController@ajaxNewAction']);
Route::get('/address/edit/{id}', ['as' => 'edit_address', 'uses' => 'AddressController@editAction']);
Route::post('/address/save', ['as' => 'save_address', 'uses' => 'AddressController@saveAction']);
Route::delete('/address/delete/{id}', ['as' => 'delete_address', 'uses' => 'AddressController@deleteAction']);


Route::get('/agent', ['as' => 'list_agent', 'uses' => 'AgentController@indexAction']);
Route::get('/agent/new', ['as' => 'new_agent', 'uses' => 'AgentController@newAction']);
Route::get('/agent/new_ajax', ['as' => 'new_agent_ajax', 'uses' => 'AgentController@ajaxNewAction']);
Route::get('/agent/edit/{id}', ['as' => 'edit_agent', 'uses' => 'AgentController@editAction']);
Route::post('/agent/save', ['as' => 'save_agent', 'uses' => 'AgentController@saveAction']);
Route::delete('/agent/delete/{id}', ['as' => 'delete_agent', 'uses' => 'AgentController@deleteAction']);

Route::get('/ship', ['as' => 'list_ship', 'uses' => 'ShipController@indexAction']);
Route::get('/ship/new', ['as' => 'new_ship', 'uses' => 'ShipController@newAction']);
Route::get('/ship/new_ajax', ['as' => 'new_ship_ajax', 'uses' => 'ShipController@ajaxNewAction']);
Route::get('/ship/edit/{id}', ['as' => 'edit_ship', 'uses' => 'ShipController@editAction']);
Route::post('/ship/save', ['as' => 'save_ship', 'uses' => 'ShipController@saveAction']);
Route::delete('/ship/delete/{id}', ['as' => 'delete_ship', 'uses' => 'ShipController@deleteAction']);

Route::get('/item', ['as' => 'list_item', 'uses' => 'ItemController@indexAction']);
Route::get('/item/new', ['as' => 'new_item', 'uses' => 'ItemController@newAction']);
Route::get('/item/new_ajax', ['as' => 'new_item_ajax', 'uses' => 'ItemController@ajaxNewAction']);
Route::get('/item/edit/{id}', ['as' => 'edit_item', 'uses' => 'ItemController@editAction']);
Route::post('/item/save', ['as' => 'save_item', 'uses' => 'ItemController@saveAction']);
Route::delete('/item/delete/{id}', ['as' => 'delete_item', 'uses' => 'ItemController@deleteAction']);

Route::get('/port', ['as' => 'list_port', 'uses' => 'PortController@indexAction']);
Route::get('/port/new', ['as' => 'new_port', 'uses' => 'PortController@newAction']);
Route::get('/port/new_ajax', ['as' => 'new_port_ajax', 'uses' => 'PortController@ajaxNewAction']);
Route::get('/port/edit/{id}', ['as' => 'edit_port', 'uses' => 'PortController@editAction']);
Route::post('/port/save', ['as' => 'save_port', 'uses' => 'PortController@saveAction']);
Route::delete('/port/delete/{id}', ['as' => 'delete_port', 'uses' => 'PortController@deleteAction']);

Route::get('/containers/new_ajax/{orderId}', ['as' => 'new_container_ajax', 'uses' => 'ContainersController@ajaxNewAction']);
Route::post('/containers/save', ['as' => 'save_container', 'uses' => 'ContainersController@saveAction']);
Route::delete('/containers/delete/{id}', ['as' => 'delete_container', 'uses' => 'ContainersController@deleteAction']);

Route::post('/attachment/upload/{orderId}', ['as' => 'upload_attachment', 'uses' => 'AttachmentsController@uploadAction']);
Route::get('/attachment/download/{id}', ['as' => 'download_attachment', 'uses' => 'AttachmentsController@downloadAction']);
Route::delete('/attachment/delete/{id}', ['as' => 'delete_attachment', 'uses' => 'AttachmentsController@deleteAction']);

Route::get('/pdf/housebill/{id}', ['as' => 'print_housebill', 'uses' => 'PdfController@houseBillAction']);

Route::get('/user', ['as' => 'list_user', 'uses' => 'UserController@indexAction']);
Route::post('/user/save', ['as' => 'save_user', 'uses' => 'UserController@saveAction']);
Route::get('/user/new', ['as' => 'new_user', 'uses' => 'UserController@newAction']);
Route::get('/user/edit/{id}', ['as' => 'edit_user', 'uses' => 'UserController@editAction']);