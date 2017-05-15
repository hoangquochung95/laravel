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

Route::get('/', [
	'uses'=>'ProductController@getIndex',
	'as'=>'product.index'

]);

Route::get('/selectCategory/{id}', [
	'uses'=>'ProductController@getSelectCate',
	'as'=>'product.selectCate'
]);
Route::get('/selectBrand/{id}', [
	'uses'=>'ProductController@getSelectBrand',
	'as'=>'product.selectBrand'
]);
Route::group(['prefix'=>'/product'],function(){
	Route::get('/', [
		'uses'=>'ProductController@getShop',
		'as'=>'product.sanpham',
	]);
	Route::get('/category', [
		'uses'=>'ProductController@getCategory',
		'as'=>'product.category',
	]);
	Route::post('/category/Add', [
		'uses'=>'ProductController@postCategory',
		'as'=>'product.addCategory',
	]);
	Route::post('/category', [
		'uses'=>'ProductController@postDeleteCategory',
		'as'=>'product.deleteCategory',
	]);

});
Route::get('/contact', [
	'uses'=>'Contact@getContact',
	'as'=>'home.contact'


]);
Route::get('/instroduction', [
	'uses'=>'Contact@getInstroduction',
	'as'=>'home.instroduction'


]);
Route::group(['middleware'=>'auth'],function(){
	Route::get('/add-to-cart/{id}',[
			'uses'=>'ProductController@getAddToCart',
			'as'=>'product.addToCart'
		]);
	Route::get('/deleteCart/{id}', [
		'uses'=>'ProductController@getDeleteCart',
		'as'=>'product.deleteCart',
	]);
	Route::get('/order', [
		'uses'=>'ProductController@getOrder',
		'as'=>'product.order',
	]);
	Route::post('/order', [
		'uses'=>'ProductController@postOrder',
		'as'=>'product.deleteOrder',
	]);
});
Route::get('/shopping-cart',[
		'uses'=>'ProductController@getCart',
		'as'=>'product.shoppingCart'
	]);


Route::group(['prefix'=>'/user'],function(){
	Route::group(['middleware'=>'guest'],function(){

		Route::get('/signup', [
		'uses'=>'UserController@getSignup',
		'as'=>'user.signup',
		]);
		Route::post('/signup', [
			'uses'=>'UserController@postSignup',
			'as'=>'user.signup',
		]);
		Route::post('/signin', [
			'uses'=>'UserController@postSignin',
			'as'=>'user.signin',
		]);

		Route::get('/signin', [
			'uses'=>'UserController@getSignin',
			'as'=>'user.signin',
		]);

		
	});

	Route::group(['middleware'=>'auth'],function(){

	
		Route::get('/profile', [
			'uses'=>'UserController@getProfile',
			'as'=>'user.profile'

		]);
		Route::post('/profile', [
			'uses'=>'UserController@postProfile',
			'as'=>'user.update'

		]);


		Route::get('/logout', [
			'uses'=>'UserController@getLogout',
			'as'=>'user.logout'

		]);
		Route::get('/admin', [
			'uses'=>'UserController@getAdmin',
			'as'=>'user.admin',
		]);
		Route::post('/admin', [
			'uses'=>'UserController@postAdmin',
			'as'=>'user.admin',
		]);
		Route::get('/delete', [
			'uses'=>'UserController@getDelete',
			'as'=>'user.delete',
		]);
		Route::post('/delete', [
			'uses'=>'UserController@postDelete',
			'as'=>'user.delete',
		]);
		Route::get('/test', [
			'uses'=>'UserController@getTest',
			'as'=>'user.test',
		]);
	});


});
