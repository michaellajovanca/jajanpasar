<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function() {
    //Route::post('login', 'UserController@login');
    Route::post('/login', 'UserController@login')->name('login');
    Route::post('daftar ', 'UserController@register');
    Route::post('kontak', 'KontakController@create');
    Route::resource('produk','ProdukController');
});

// Route::get('/user/verify/{token}', 'Auth\UserController@verifyUser');
// Route::get('/send/email', 'UserController@mail');
Route::resource('sale','DiscountController');


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users','UserController@index');
    Route::get('users/{id}','UserController@show');
    Route::patch('users/{id}','UserController@update');
});