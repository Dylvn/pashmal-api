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

/* GENRES */
Route::get('/genres', 'GenreController@index')->name('genre_index');
Route::get('/genres/{genre}', 'GenreController@show')->name('genre_show');
Route::post('/genres', 'GenreController@store')->name('genre_store');
Route::put('/genres/{genre}', 'GenreController@update')->name('genre_update');
Route::delete('/genres/{genre}', 'GenreController@destroy')->name('genre_destroy');

/* BOOKS */
Route::get('/books', 'BookController@index')->name('book_index');
Route::get('/books/{book}', 'BookController@show')->name('book_show');
Route::post('/books', 'BookController@store')->name('book_store');
Route::put('/books/{book}', 'BookController@update')->name('book_update');
Route::delete('/books/{book}', 'BookController@destroy')->name('book_destroy');

/* ORDERS */
Route::get('/orders', 'OrderController@index')->name('order_index');
Route::get('/orders/{order}', 'OrderController@show')->name('order_show');
Route::post('/orders', 'OrderControlle@store')->name('order_store');
Route::put('/orders/{order}', 'OrderController@update')->name('order_update');
Route::delete('/orders/{order}', 'OrderController@destroy')->name('order_destroy');
