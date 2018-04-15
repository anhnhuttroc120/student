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
// Route::group(['middleware'=>'auth'],function(){
// 	Route::get('/home', 'HomeController@index');
// 	Route::get('/','StudentController@index')->name('home');
// 	Route::get('index','StudentController@index');
// 	Route::get('paginate','StudentController@index1');

// 	Route::get('show/{id}','StudentController@show');	
// 	Route::get('add','StudentController@create');
// 	Route::post('add','StudentController@add');
// 	Route::group(['middleware'=>'CheckAdmin'],function(){
// 			Route::get('update/{id}','StudentController@getUpdate');
// 			Route::put('update/{id}','StudentController@update');
// 			Route::get('delete/{id}','StudentController@delete');
// 	});


// });


// Route::post('ajax','StudentController@ajax');
// Route::post('/ajax/','StudentController@ajax');
// Route::post('/select','StudentController@school');
// Auth::routes();
Route::resource('main','MainController');
Route::get('','MainController@index');
Route::get('delete/{id}','MainController@destroy');
Route::post('/select','MainController@school');




