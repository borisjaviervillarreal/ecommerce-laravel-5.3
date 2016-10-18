<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','MainController@home');

Auth::routes();

Route::resource('products', 'ProductsController');

Route::resource('in_shopping_carts', 'InShoppingCartsController', [
	'only' => ['store', 'destroy']
]);

Route::resource('compras', 'ShoppingCartsController',[
	'only' => ['show']
]);

Route::resource('orders', 'OrdersController', [
	'only' => ['index', 'update']
]);

Route::get('/carrito', 'ShoppingCartsController@index');
Route::post('/carrito', 'ShoppingCartsController@checkout');

Route::get('payments/store', 'PaymentsController@store');

Route::get('/home', 'HomeController@index');

Route::get('products/images/{filename}', function($filename){
	$path = storage_path("app/images/$filename");

	if(!\File::exists($path)) abort(404);

	$file = \File::get($path);

	$type = \File::mimeType($path);

	$response = Response::make($file,200);

	$response->header("Content-Type", $type);

	return $response;
});
