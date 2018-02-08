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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',function (){
    return view('admin.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Users Route

Route::get('/users','UsersController@view');
Route::get('users/{id}/edit',[
    'uses'=>'UsersController@edit',
    'as' => 'user.edit'
]);

Route::post('users/{id}',[
    'uses'=>'UsersController@update',
    'as' =>'user.update',
]);
Route::post('users/{id}',[
    'uses'=>'UsersController@destroy',
    'as' =>'user.destroy',
]);

