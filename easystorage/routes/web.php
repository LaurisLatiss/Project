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
})->name('/welcome');

Route::post('/storeitem','ItemController@storeItem')->name('store');
Route::get('/deleteitem/{item_id}', 'ItemController@deleteItem')->name('delete');
Route::post('/updateitem/{item_id}','ItemController@updateItem')->name('update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::post('/user/change/email', 'HomeController@changeEmail')->name('email.update');

Route::get('/welcome/back', "HomeController@maintanceModeOff")->name('live');
Route::get('/sorrynotsorry/weare/busy', "HomeController@maintanceModeOn")->name('maintance');
Route::get('change-password', 'Auth\UpdatePasswordController@index')->name('password.form');
Route::post('change-password', 'Auth\UpdatePasswordController@update')->name('password.update');

Route::get('/banned','BannedController@index')->name('banned');
Route::get('/unban/{user_id}','BannedController@unbanUser')->name('unban');
Route::get('/ban/{user_id}','BannedController@banUser')->name('ban');
