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

//Front End
Route::get('/', 'HomeController@index');





//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SuperAdminController@logout');


//Categories
Route::resource('categories', 'CategoryController');
Route::get('category/{category_id}', 'CategoryController@UpdateStatus');


//Manufacture/Brands

Route::resource('manufactures', 'ManufactureController');
Route::get('manufacture/{manufacture_id}', 'ManufactureController@UpdateStatus');


//Products

Route::resource('products', 'ProductController');















//Route::delete('categories/{category_id} ', 'CategoryController@delete')
//Route::get('unactive_category/{category_id}', 'CategoryController@unactive');
//Route::get('active_category/{category_id}', 'CategoryController@active');























//Category Related to the root
//Route::get('/all-category', 'CategoryController@index');
//Route::get('/add-category', 'CategoryController@add');
//Route::post('/save-category', 'CategoryController@save_category');

//Route::get('categories','CategoryController')->name('category.index');
//Route::get('category/create','CategoryController')->name('create');
//Route::post('category','CategoryController')->name('category.store');