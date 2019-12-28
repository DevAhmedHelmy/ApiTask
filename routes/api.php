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



Route::group(['middleware' => 'cors'], function () {
    Route::get('/customers','CustomerController@index');
    Route::get('/customers/{customer}','CustomerController@show');

    Route::get('/actions','ActionController@index');
    Route::get('/actions/{action}','ActionController@show');
    
});

Route::group(['middleware' => 'postCors'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('signup');

    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function () {
    
     
        Route::post('logout', 'AuthController@logout');
        
         
    
    });
});



// Route::apiResource('customers', 'CustomerController');

// Route::apiResource('actions', 'ActionController');
 
