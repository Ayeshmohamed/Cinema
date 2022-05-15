<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/halls', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'V1', 'prefix' => 'v1',], function () {
        Route::group(['middleware' => ['auth:api']], function () {
            Route::group(['prefix' => 'halls'], function () {
                Route::get('all', 'HallsController@index');
                Route::post('store', 'HallsController@store');
                Route::patch('update', 'HallsController@update');
                Route::delete('delete', 'HallsController@delete');
            });
            Route::group(['prefix' => 'movies'], function () {
                Route::get('all', 'MoviesController@index');
                Route::post('store', 'MoviesController@store');
                Route::patch('update', 'MoviesController@update');
                Route::delete('delete', 'MoviesController@delete');
            });
            Route::group(['prefix' => 'hall_movies'], function () {
                Route::get('all', 'HallMoviesController@index');
                Route::post('store', 'HallMoviesController@store');
                Route::patch('update', 'HallMoviesController@update');
                Route::delete('delete', 'HallMoviesController@delete');
            });
        });
    });
});
