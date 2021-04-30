<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','front\indexController@index')->name('index');
Route::get('/book/detail/{selflink}','front\book\indexController@index')->name('book.detail');
Route::get('/basket/add/{id}','front\basket\indexController@add')->name('basket.add');
Route::get('/basket','front\basket\indexController@index')->name('basket.index');
Route::get('/basket/remove/{id}','front\basket\indexController@remove')->name('basket.remove');
Route::get('/basket/complete','front\basket\indexController@complete')->name('basket.complete')->middleware(['auth']);
Route::post('/basket/complete','front\basket\indexController@completeStore')->name('basket.completeStore')->middleware(['auth']);

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

    Route::group(['namespace' => 'slider', 'prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/create', 'indexController@create')->name('create');
        Route::post('/create', 'indexController@store')->name('create.post');
        Route::get('/edit/{id}', 'indexController@edit')->name('edit');
        Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
        Route::get('/delete/{id}', 'indexController@delete')->name('delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
