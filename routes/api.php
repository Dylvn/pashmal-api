<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/genres', 'GenreController@index')->name('genre_index');
Route::get('/genres/{genre}', 'GenreController@show')->name('genre_show');
Route::post('/genres', 'GenreController@store')->name('genre_store');
Route::put('/genres/{genre}', 'GenreController@update')->name('genre_update');
Route::delete('/genres/{genre}', 'GenreController@destroy')->name('genre_destroy'); 