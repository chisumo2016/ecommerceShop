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
//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SuperAdminController@logout');



Route::resource('categories', 'CategoryController');
























//Category Related to the root
//Route::get('/all-category', 'CategoryController@index');
//Route::get('/add-category', 'CategoryController@add');
//Route::post('/save-category', 'CategoryController@save_category');

//Route::get('categories','CategoryController')->name('category.index');
//Route::get('category/create','CategoryController')->name('create');
//Route::post('category','CategoryController')->name('category.store');