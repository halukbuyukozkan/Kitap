<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'indexController@index')->name('index');

    Route::group(['namespace' => 'publisher', 'prefix' => 'publisher', 'as' => 'publisher.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/create', 'indexController@store')->name('create.post');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace' => 'author', 'prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/create', 'indexController@store')->name('create.post');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace' => 'book', 'prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/create', 'indexController@store')->name('create.post');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });

    Route::group(['namespace' => 'category', 'prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/create', 'indexController@store')->name('create.post');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });
});
