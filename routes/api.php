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

Route::prefix('comic')->group(function () {
    Route::post('/', 'ComicController@store');
    Route::get('/search/{keyword}', 'ComicController@search');

    Route::prefix('read')->group(function (){
        Route::get('/{comicName}', 'ComicController@readLatestEpisode');
        Route::get('/{comicName}/{no}', 'ComicController@readEpisode');
    });
});